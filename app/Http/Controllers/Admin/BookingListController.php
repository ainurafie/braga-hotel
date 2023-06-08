<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

use App\Models\BookingList;
use App\Models\User;

use App\Jobs\SendEmail;

use DataTables;
use Carbon\Carbon;

class BookingListController extends Controller
{
    public function json()
    {
        $data = BookingList::with([
            'room', 'user'
        ]);

        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.booking-list.index');
    }

    public function update($id, $value)
    {
        $item   = BookingList::findOrFail($id);

        if ($value == 1) {
            $item->status = 'DISETUJUI';
            $item->save();
            return redirect()->route('booking-list.index')->with('alert-success', 'Berhasil disetujui');
        } elseif ($value == 0) {
            $item->status = 'DITOLAK';
            $item->save();
            return redirect()->route('booking-list.index')->with('alert-success', 'Berhasil ditolak');
        } else {
            session()->flash('alert-failed', 'Perintah tidak dimengerti');
            return redirect()->route('booking-list.index');
        }

    }
}
