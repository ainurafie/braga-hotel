<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CategoryRequest;
use App\Models\RoomCategory;
use Illuminate\Http\Request;
use DataTables;


class RoomCategoryController extends Controller
{
    public function json(){
        $data = RoomCategory::all();

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
        return view('pages.admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.category.edit_or_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();


        $createCategory = RoomCategory::create($data);
        
        if($createCategory) {
            $request->session()->flash('alert-success', 'Kategori '.$data['name'].' berhasil ditambahkan');
        } else {
            $request->session()->flash('alert-failed', 'Kategori '.$data['name'].' gagal ditambahkan');
        }

        return redirect()->route('category.index');
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
        $item = RoomCategory::findOrFail($id);

        return view('pages.admin.category.edit_or_create', [
            'item'  => $item 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();


        $item = RoomCategory::findOrFail($id);

        if($item->update($data)) {
            $request->session()->flash('alert-success', 'Ruang '.$item->name.' berhasil diupdate');
        } else {
            $request->session()->flash('alert-failed', 'Ruang '.$item->name.' gagal diupdate');
        }
        
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = RoomCategory::findOrFail($id);
        
        if($item->delete()) {
            session()->flash('alert-success', 'Ruang '.$item->name.' berhasil dihapus!');
        } else {
            session()->flash('alert-failed', 'Ruang '.$item->name.' gagal dihapus');
        }

        return redirect()->route('category.index');
    }
}
