<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BusController extends Controller
{
    public function users()
    {
        $users = User::select('name', 'email');
        return datatables($users)->make(true);
    }
    public function create()
    {
        return view('bus.create');
    }

    public function store(Request $request)
    {
        $this->validateStore($request);
        $bus = new Bus;
        abort_if(!$this->busSave($bus, $request), 404);

        return redirect()->route('admin.buses');
    }

    public function edit($id)
    {
        $bus = Bus::findOrFail($id);
        return view('bus.edit', compact('bus'));
    }
    public function update(Request $request, $id)
    {
        $this->validateUpdate($request);
        $bus = Bus::findOrFail($id);
        abort_if(!$this->busSave($bus, $request), 404);
        Alert::toast('Bus info updated.');
        return redirect()->route('admin.buses');
    }
    public function destroy($id)
    {
        $bus = Bus::findOrFail($id);
        $bus->delete();
        Alert::toast('Bus deleted!');
        return redirect()->route('admin.buses');
    }
    private function busSave(Bus $bus, $request)
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
    private function validateUpdate($request)
    {
        return $request->validate([
            'name' => 'required|min:3',
            'bus_code' => 'required|min:3',
            'img' => 'sometimes|image|max:3000',
            'from' => 'required|min:2',
            'to' => 'required|min:2',
            'seats' => 'required',
            'driver_name' => 'required',
            'status' => 'required',
            'fare' => 'required',
        ]);
    }
    protected function getFileName($file)
    {
        $fileName = $file->getClientOriginalName();
        $actualFileName = pathinfo($fileName, PATHINFO_FILENAME);
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        return $actualFileName . time() . '.' . $fileExtension;
    }
}
