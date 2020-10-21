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

  public function search(Request $request)
  {
    if ($request->q) {
      $data = Bus::where('name', 'LIKE', '%' . $request->q . '%');
    } else if ($request->arrivalDays) {
      $data = Bus::where('arrival_days', 'LIKE', '%' . $request->arrivalDays . '%');
    } else {
      $data = Bus::latest();
    }

    $buses = $data->paginate(6);
    return view('home.list', compact('buses'));
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
