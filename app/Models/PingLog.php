<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PingLog extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan (jika tidak menggunakan tabel default)
    protected $table = 'ping_logs'; 

    // Atribut yang dapat diisi
    protected $fillable = [
        'ip_address',
        'port',
        'status',
        'port_status',
    ];
}
