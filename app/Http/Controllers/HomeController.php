<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    return view('home.index');
  }
  public function show()
  {
    return view('show');
  }

  public function myReservations()
  {
    return view('my-reservations');
  }
}
