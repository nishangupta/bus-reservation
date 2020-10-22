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
    if ($request->arrivalLocation && $request->destination && $request->arrivalDays) {
      $data = Bus::where([
        ['from', 'LIKE', '%' . $request->arrivalLocation . '%'],
        ['to', 'LIKE', '%' . $request->destination . '%'],
        ['arrival_days', 'LIKE', '%' . $request->arrivalDays . '%'],
      ]);
    } else if ($request->q) {
      $data = Bus::where('name', 'LIKE', '%' . $request->q . '%');
    } else if ($request->arrivalDays) {
      $data = Bus::where('arrival_days', 'LIKE', '%' . $request->arrivalDays . '%');
    } else if ($request->arrivalLocation) {
      $data = Bus::where('from', 'LIKE', '%' . $request->arrivalLocation . '%');
    } else {
      $data = Bus::latest();
    }
    $arrivalLocations = Bus::take(20)->get(['from']);
    $buses = $data->paginate(6);
    return view('home.list', compact('buses', 'arrivalLocations'));
  }

  public function show(Bus $bus)
  {
    return view('home.show', compact('bus'));
  }
}
