<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create()
    {
        return view('reservation.create');
    }

    public function store(Request $request)
    {
        $this->validateStore($request);
        $bus = new Bus;
        abort_if(!$this->busSave($bus, $request), 404);

        return redirect()->route('admin.buses');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.buses');
    }
    private function save(Bus $bus, $request)
    {

        $bus->name = $request->name;
        $bus->bus_code = $request->bus_code;
        $bus->from = $request->from;
        $bus->to = $request->to;
        $bus->arrival_days = $request->arrival_days;
        $bus->arrival_time = $request->arrival_time;
        $bus->fare = $request->fare;
        $bus->driver_name = $request->driver_name;
        $bus->status = $request->status;
        $bus->seats = $request->seats;

        //logo
        if ($request->hasFile('img')) {
            $fileNameToStore = $this->getFileName($request->file('img'));
            $logoPath = $request->file('img')->storeAs('public/bus', $fileNameToStore);
            if ($bus->img) {
                Storage::delete('public/bus/' . basename($bus->img));
            }
            $bus->img = 'storage/bus/' . $fileNameToStore;
        }


        if ($bus->save()) {
            return true;
        }
        return false;
    }
    private function validateStore($request)
    {
        return $request->validate([
            'name' => 'required|min:3',
            'bus_code' => 'required|min:3',
            'img' => 'required|image|max:3000',
            'from' => 'required|min:2',
            'to' => 'required|min:2',
            'seats' => 'required',
            'driver_name' => 'required',
            'status' => 'required',
            'fare' => 'required',
        ]);
    }
}
