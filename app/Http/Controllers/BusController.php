<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function users()
    {
        $users = User::select('name', 'email');
        return datatables($users)->make(true);
    }
}
