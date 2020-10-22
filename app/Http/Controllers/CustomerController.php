<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Reservation;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.index');
    }
    public function all()
    {
        $customers = User::role('user')->withCount('reservations')->get();
        return DataTables::of($customers)
            ->addColumn('total-reservations', function ($row) {
                return $row->reservations_count;
            })
            ->addColumn('created_at', function ($row) {
                return date('Y/m/d h:i A', strtotime($row->created_at));
            })
            ->make(true);
    }

    public function pendingRequest()
    {
        return view('customer.pending-request');
    }

    public function pendingRequestApi()
    {
        $pending = Reservation::with(['user', 'bus'])->latest()->get();
        return DataTables::of($pending)
            ->addColumn('name', function ($row) {
                return '<a target="_blank" href="/bus/' . $row->bus->id . '">' . $row->bus->name . '</a>';
            })
            ->addColumn('customer_name', function ($row) {
                return $row->user->name;
            })
            ->addColumn('customer_email', function ($row) {
                return $row->user->email;
            })
            ->addColumn('pending', function ($row) {
                return $row->pending ? '<span class="text-warning">Pending</span>' : '<span class="text-primary">Approved</span>';
            })
            ->addColumn('rejected', function ($row) {
                return $row->rejected ? '<span class="text-danger">Rejected</span>' : '<span class="text-info">Not rejected</span>';
            })
            ->addColumn('created_at', function ($row) {
                return date('Y/m/d h:i A', strtotime($row->created_at));
            })
            ->addColumn('actions', function ($row) {
                $btns = '<a class="btn btn-primary btn-sm" href="customer-reservations/' . $row->id . '/approve">Approve</a>
                        <a class="btn btn-danger btn-sm" href="customer-reservations/' . $row->id . '/reject">Reject</a>
                        ';
                return $btns;
            })
            ->rawColumns(['name', 'actions', 'created_at', 'pending', 'rejected'])
            ->make(true);
    }

    public function requestApprove(Reservation $id)
    {
        $id->update([
            'pending' => false,
        ]);
        Alert::toast('Request was approved!', 'success');
        return redirect(route('customer.pendingRequest'));
    }

    public function requestReject(Reservation $id)
    {
        $id->update([
            'rejected' => true
        ]);
        Alert::toast('Request was Rejected!', 'success');
        return redirect()->route('customer.pendingRequest');
    }
}
