<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PingLog;
use App\Services\PingService;

class CctvMonitorController extends Controller
{
    // Method untuk menampilkan form monitoring IP dan port
    public function showForm()
    {
        return view('monitoring-form'); 
    }

    protected $pingService;
    public function __construct(PingService $pingService)
    {
        $this->pingService = $pingService;
    }

    // Fungsi untuk menangani ping IP Address
    public function handlePingIp(Request $request)
    {
        // Validasi input
        $request->validate([
            'ip_address' => 'required|ip',
        ]);

        $ipAddress = $request->input('ip_address');
        // Memanggi fungsi Ping 
        $status = $this->pingIP($ipAddress);

        // Jika timeout akan tersimpan ke database
        if ($status === 'timeout') {
            PingLog::create([
                'ip_address' => $ipAddress,
                'status' => $status,
                'port' => null, // Tidak ada port karena ini pengecekan IP
            ]);
        }

        // Kembalikan hasil ke view
        return view('monitoring-form', compact('ipAddress', 'status'));
    }

    // Fungsi untuk menangani ping ke port
    public function handlePingPort(Request $request)
    {
        // Validasi input
        $request->validate([
            'port' => 'required|integer',
        ]);

        $port = $request->input('port');
        // Panggil fungsi untuk cek koneksi ke port
        $status = $this->checkPortConnection('127.0.0.1', $port);

        // Jika timeout, simpan ke database
        if ($status === 'timeout') {
            PingLog::create([
                'ip_address' => '127.0.0.1',
                'port' => $port,
                'status' => $status,
                'port_status' => $status,
            ]);
        }

        // Kembalikan hasil ke view
        return view('monitoring-form', compact('port', 'status'));
    }

    // Method untuk melakukan ping ke IP Address
    private function pingIP($ipAddress)
    {
        $pingResult = exec("ping -c 1 $ipAddress", $output, $resultCode);
        return $resultCode === 0 ? 'success' : 'timeout'; // Jika resultCode 0, ping berhasil
    }

    // Method untuk memeriksa koneksi ke port
    private function checkPortConnection($ipAddress, $port)
    { 
        $connection = @fsockopen($ipAddress, $port, $errno, $errstr, 5);
        
        if (is_resource($connection)) {
            fclose($connection);
            return 'success';   
        } else {
            return 'timeout';
        }
    }
}
