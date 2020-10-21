<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use Yajra\DataTables\DataTables;

class ApiBusController extends Controller
{
  public function getAllBuses()
  {
    $buses = Bus::latest()->get();
    return  DataTables::of($buses)
      ->addIndexColumn()
      ->addColumn('created_at', function ($row) {
        return date('d/m/Y h:i A', strtotime($row->created_at));
      })
      ->addColumn('actions', function ($row) {
        $btns = ' <a class="btn btn-info float-left  btn-sm w-50 " href="' . '$row->path()' . '" ><i class="fas fa-eye"></i> View</a>
                  <a class="btn btn-primary btn-sm float-left w-50 " href="/admin/bus/' . $row->id . '/edit"><i class="fas fa-pen-square"></i> Edit</a>';
        return $btns;
      })
      ->rawColumns(['actions', 'created_at'])
      ->make(true);
  }
}
