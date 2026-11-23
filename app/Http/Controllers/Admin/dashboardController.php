<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengaduan;

class dashboardController extends Controller
{
    public function index() {
        $stats = [
            'total' => Pengaduan::count(),
            'menunggu' => Pengaduan::where('status', 'menunggu')->count(),
            'diproses' => Pengaduan::where('status', 'diproses')->count(),
            'selesai' => Pengaduan::where('status', 'selesai')->count(),
            'siswa' => User::where('role', 'siswa')->count()
        ];

        $terbaru = Pengaduan::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'terbaru' ));
    }
}

