<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function buses()
    {
        return view('admin.buses');
    }
}
