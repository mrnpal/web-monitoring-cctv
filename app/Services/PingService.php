<?php

namespace App\Services;

class PingService
{
    // Fungsi untuk melakukan ping ke IP Address
    public function pingIP($ipAddress)
    {
        // Jalankan perintah ping menggunakan exec
        $pingResult = exec("ping -c 1 $ipAddress", $output, $resultCode);
        
        // Jika resultCode 0, ping berhasil
        return $resultCode === 0 ? 'success' : 'timeout';
    }

    // Fungsi untuk memeriksa koneksi ke port
    public function checkPortConnection($ipAddress, $port)
    {
        // Buka koneksi ke port dengan fsockopen
        $connection = @fsockopen($ipAddress, $port, $errno, $errstr, 5);
        
        if (is_resource($connection)) {
            // Jika koneksi berhasil
            fclose($connection);
            return 'success';
        } else {
            // Jika koneksi gagal
            return 'timeout';
        }
    }
}
