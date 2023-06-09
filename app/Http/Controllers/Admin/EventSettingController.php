<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use DataTables;


class EventSettingController extends Controller
{
    public function json()
    {
        $data = Event::all();

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

        return view('pages.admin.event.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event = Event::all();

        return view('pages.admin.event.edit_or_create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('assets/image/event', 'public');
        }

        $createEvent = Event::create($data);

        if ($createEvent) {
            $request->session()->flash('alert-success', 'Event ' . $data['title'] . ' berhasil ditambahkan');
        } else {
            $request->session()->flash('alert-failed', 'Event ' . $data['title'] . ' gagal ditambahkan');
        }

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Event::findOrFail($id);


        return view('pages.admin.event.edit_or_create', [
            'item'  => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {
        $data = $request->all();

        if (isset($data['photo'])) {
            $data['photo']          = $request->file('photo')->store(
                'assets/image/event',
                'public'
            );
        }

        $item = Event::findOrFail($id);

        if ($item->update($data)) {
            $request->session()->flash('alert-success', 'Event ' . $item->title . ' berhasil diupdate');
        } else {
            $request->session()->flash('alert-failed', 'Event ' . $item->title . ' gagal diupdate');
        }

        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Event::findOrFail($id);

        if ($item->delete()) {
            session()->flash('alert-success', 'Event ' . $item->title . ' berhasil dihapus!');
        } else {
            session()->flash('alert-failed', 'Event ' . $item->title . ' gagal dihapus');
        }

        return redirect()->route('events.index');
    }
}
