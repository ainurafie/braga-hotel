<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Room;

use App\Http\Requests\Admin\RoomRequest;
use App\Models\RoomCategory;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    public function json()
    {
        $data = Room::with('categories')->get();


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
        return view('pages.admin.room.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = RoomCategory::all();

        return view('pages.admin.room.edit_or_create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        $data = $request->all();

        // Format harga
        $price = str_replace(['.', ','], '', $data['price']);
        $formattedPrice = number_format((float) $price, 2, '.', '');
        $data['price'] = $formattedPrice;

        if ($request->hasFile('photo')) {
            $photos = [];
            foreach ($request->file('photo') as $photo) {
                $path = $photo->store('assets/image/room', 'public');
                $photos[] = $path;
            }
            $data['photo'] = json_encode($photos); // Mengonversi array foto menjadi string JSON
            $data['photo'] = htmlspecialchars_decode($data['photo']);
        }

        $createRoom = Room::create($data);

        if ($createRoom) {
            $request->session()->flash('alert-success', 'Ruang ' . $data['name'] . ' berhasil ditambahkan');
        } else {
            $request->session()->flash('alert-failed', 'Ruang ' . $data['name'] . ' gagal ditambahkan');
        }

        return redirect()->route('room.index');
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
        $item = Room::findOrFail($id);
        $category = RoomCategory::all();


        return view('pages.admin.room.edit_or_create', [
            'item'  => $item,
            'category'  => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequest $request, $id)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('rooms')->whereNull('deleted_at')->ignore($id),
            ],
        ], [
            'name.required' => 'Nama ruangan harus diisi.',
            'name.string' => 'Nama ruangan harus berupa teks.',
            'name.max' => 'Nama ruangan tidak boleh melebihi :max karakter.',
            'name.unique' => 'Nama ruangan sudah digunakan.',
        ]);

        $data = $request->all();
        $item = Room::findOrFail($id);

        $price = str_replace(['.', ','], '', $data['price']);
        $formattedPrice = number_format((float) $price, 2, '.', '');
        $data['price'] = $formattedPrice;


        if ($request->hasFile('photo')) {
            $photos = [];
            foreach ($request->file('photo') as $photo) {
                $path = $photo->store('assets/image/room', 'public');
                $photos[] = $path;
            }
            $data['photo'] = json_encode($photos);

            // Hapus foto lama jika ada
            if ($item->photo) {
                $oldPhotos = json_decode(htmlspecialchars_decode($item->photo));
                foreach ($oldPhotos as $oldPhoto) {
                    Storage::disk('public')->delete($oldPhoto);
                }
            }
            $data['photo'] = htmlspecialchars_decode($data['photo']);
        } else {
            $data['photo'] = $item->photo;
        }


        if ($item->update($data)) {
            $request->session()->flash('alert-success', 'Ruang ' . $item->name . ' berhasil diupdate');
        } else {
            $request->session()->flash('alert-failed', 'Ruang ' . $item->name . ' gagal diupdate');
        }

        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Room::findOrFail($id);

        if ($item->photo) {
            $photos = json_decode(htmlspecialchars_decode($item->photo));
            foreach ($photos as $photo) {
                Storage::disk('public')->delete($photo);
            }
        }

        if ($item->delete()) {
            session()->flash('alert-success', 'Ruang ' . $item->name . ' berhasil dihapus!');
        } else {
            session()->flash('alert-failed', 'Ruang ' . $item->name . ' gagal dihapus');
        }

        return redirect()->route('room.index');
    }
}
