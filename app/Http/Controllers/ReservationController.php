<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\Reservation;
use App\Models\User;
use App\Notifications\ReservationMade;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class ReservationController extends Controller
{
    public function index()
    {
        return view('reservation.index');
    }
    public function create(Request $request, Bus $bus)
    {
        $request->validate([
            'phone' => 'required',
            'additional_query' => 'sometimes',
            'passengers' => 'required'
        ]);

        if ($this->hasApplied($bus->id)) {
            Alert::toast('You already applied for this reservation! Wait for admin approval!', 'info');
            return redirect()->route('reservation.index');
        }

        $reservation = new Reservation;
        $reservation->user_id = auth()->user()->id;
        $reservation->bus_id = $bus->id;
        $reservation->phone = $request->phone;
        $reservation->passengers = $request->passengers;
        $reservation->additional_query = $request->additional_query;
        $reservation->save();

        $admin = User::where('email', 'admin@admin.com')->first();
        $admin->notify(new ReservationMade(auth()->user()));

        Alert::toast('Your reservation was made!', 'success');
        return redirect()->route('reservation.index');
    }

    public function myReservationsApi()
    {
        $reservations = Reservation::where('user_id', auth()->user()->id)->with('bus')->latest();
        return  DataTables::of($reservations)
            ->addIndexColumn()
            ->addColumn('name', function ($row) {
                return '<a target="_blank" href="/bus/' . $row->bus->id . '">' . $row->bus->name . '</a>';
            })
            ->addColumn('from', function ($row) {
                return $row->bus->from;
            })
            ->addColumn('to', function ($row) {
                return $row->bus->to;
            })
            ->addColumn('created_at', function ($row) {
                return date('Y/m/d h:i A', strtotime($row->created_at));
            })
            ->addColumn('pending', function ($row) {
                return $row->pending ? 'true' : 'false';
            })
            ->addColumn('rejected', function ($row) {
                return $row->rejected ? 'true' : 'false';
            })
            ->addColumn('actions', function ($row) {
                $btns = '<a class="btn btn-danger" href="my-reservations/' . $row->id . '/destroy">Delete</a>';
                return $btns;
            })
            ->rawColumns(['name', 'from', 'to', 'actions', 'created_at'])
            ->make(true);
    }
    public function destroy(Reservation $id)
    {
        //id refrences reservation
        $id->delete();
        Alert::toast('Reservation Deleted!', 'success');
        return redirect()->route('reservation.index');
    }

    private function hasApplied($busId)
    {
        $user = auth()->user();
        $applied = $user->reservations()->where('bus_id', $busId)->get();
        if ($applied->count()) {
            return true;
        } else {
            return false;
        }
    }
}
