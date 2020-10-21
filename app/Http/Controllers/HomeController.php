<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;

class HomeController extends Controller
{
  public function index()
  {
    $buses = Bus::latest()->take(4)->get();
    return view('home.index')->with([
      'buses' => $buses
    ]);
  }

  public function search()
  {
    return view('home.list');
  }

  public function show(Bus $bus)
  {
    return view('home.show', compact('bus'));
  }

  public function myReservations()
  {
    return view('home.my-reservations');
  }
}
