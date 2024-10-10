<?php

namespace App\Services;

class PingService
{
    // Fungsi untuk melakukan ping ke IP Address
    public function pingIP($ipAddress)
    {
        
        $pingResult = exec("ping -c 1 $ipAddress", $output, $resultCode);
        
        
        return $resultCode === 0 ? 'success' : 'timeout';
    }


    public function checkPortConnection($ipAddress, $port)
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
