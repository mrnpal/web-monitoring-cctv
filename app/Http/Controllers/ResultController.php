<?php

namespace App\Http\Controllers;
use App\Models\PingLog; 
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function showLogs()
{
    $logs = PingLog::all();
    return view('result-page', compact('logs'));
}
    
}
