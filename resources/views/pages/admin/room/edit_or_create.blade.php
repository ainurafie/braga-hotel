@extends('layouts.main')

@section('title')
    @if (isset($item))
        Edit Data Ruangan - Braga Hotel
    @else
        Tambah Data Ruangan - Braga Hotel
    @endif
@endsection

@section('header-title')
    @if (isset($item))
        Edit Data Ruangan
    @else
        Tambah Data Ruangan
    @endif
@endsection

@section('breadcrumbs')
    <div class="breadcrumb-item"><a href="#">Ruangan</a></div>
    <div class="breadcrumb-item"><a href="{{ route('room.index') }}">Data Ruangan</a></div>
    <div class="breadcrumb-item @if (isset($item)) '' @else 'active' @endif">
        @if (isset($item))
            <a href="#">Edit Data Ruangan</a>
        @else
            Tambah Data Ruangan
        @endif
    </div>
    @isset($item)
        <div class="breadcrumb-item active">{{ $item->name }}</div>
    @endisset
@endsection

@section('section-title')
    @if (isset($item))
        Edit Data Ruangan
    @else
        Tambah Data Ruangan
    @endif
@endsection

@section('section-lead')
    Silakan isi form di bawah ini untuk @if (isset($item))
        mengedit data {{ $item->name }}
    @else
        menambah data Ruangan.
    @endif
@endsection

@section('content')

    @component('components.form')
        @slot('row_class', 'justify-content-center')
        @slot('col_class', 'col-12 col-md-6')

        @if (isset($item))
            @slot('form_method', 'POST')
            @slot('method', 'PUT')
            @slot('form_action', 'room.update')
            @slot('update_id', $item->id)
        @else
            @slot('form_method', 'POST')
            @slot('form_action', 'room.store')
        @endif

        @slot('is_form_with_file', 'true')

        @slot('input_form')

            {{-- @component('components.input-field')
                @slot('input_label', 'Nama')
                @slot('input_type', 'text')
                @slot('input_name', 'name')
                @isset($item->name)
                    @slot('input_value')
                        {{ $item->name }}
                    @endslot
                @endisset
                @empty($item)
                    @slot('form_group_class', 'required')
                    @slot('other_attributes', 'required autofocus')
                @endempty
            @endcomponent --}}

            @component('components.input-field')
                @slot('input_label', 'Nomer Kamar')
                @slot('input_type', 'select')
                @slot('input_name', 'name')
                @isset($item->name)
                    @slot('select_content')
                        <option value="">Pilih Nomer Kamar</option>
                        <option value="101" @if ($item->name == 101) selected @endif>Kamar 101</option>
                        <option value="102" @if ($item->name == 102) selected @endif>Kamar 102</option>
                        <option value="103" @if ($item->name == 103) selected @endif>Kamar 103</option>
                        <option value="201" @if ($item->name == 201) selected @endif>Kamar 201</option>
                        <option value="202" @if ($item->name == 202) selected @endif>Kamar 202</option>
                        <option value="203" @if ($item->name == 203) selected @endif>Kamar 203</option>
                        <option value="205" @if ($item->name == 205) selected @endif>Kamar 205</option>
                        <option value="206" @if ($item->name == 206) selected @endif>Kamar 206</option>
                        <option value="301" @if ($item->name == 301) selected @endif>Kamar 301</option>
                        <option value="302" @if ($item->name == 302) selected @endif>Kamar 302</option>
                        <option value="303" @if ($item->name == 303) selected @endif>Kamar 303</option>
                        <option value="305" @if ($item->name == 305) selected @endif>Kamar 305</option>
                        <option value="306" @if ($item->name == 306) selected @endif>Kamar 306</option>
                        {{-- @for ($i = 1; $i <= 13; $i++)
                            <option value="{{ $i }}" @if ($item->name == $i) selected @endif>{{ $i }}</option>
                        @endfor --}}
                    @endslot
                @else
                    @slot('select_content')
                        <option value="">Pilih Nomer Kamar</option>
                        <option value="101">Kamar 101</option>
                        <option value="102">Kamar 102</option>
                        <option value="103">Kamar 103</option>
                        <option value="201">Kamar 201</option>
                        <option value="202">Kamar 202</option>
                        <option value="203">Kamar 203</option>
                        <option value="205">Kamar 205</option>
                        <option value="206">Kamar 206</option>
                        <option value="301">Kamar 301</option>
                        <option value="302">Kamar 302</option>
                        <option value="303">Kamar 303</option>
                        <option value="305">Kamar 305</option>
                        <option value="306">Kamar 306</option>
                    @endslot
                @endisset
                @error('name')
                    @include('includes.error-field', ['error' => $message])
                @enderror
            @endcomponent


            @component('components.input-field')
                @slot('input_label', 'Deskripsi')
                @slot('input_type', 'textarea')
                @slot('input_name', 'description')
                @slot('input_rows', 2)
                @isset($item->description)
                    @slot('input_value')
                        {{ $item->description }}
                    @endslot
                @endisset
                @isset($item)
                    @slot('other_attributes', 'autofocus')
                @endisset
            @endcomponent

            @component('components.input-field')
                @slot('input_label', 'Kategori')
                @slot('input_type', 'select')
                @slot('input_name', 'category_id')
                @isset($category)
                    @slot('select_content')
                        <option value="">Pilih Kategori</option>
                        @foreach ($category as $itemCategory)
                            <option value="{{ $itemCategory->id }}" @if (isset($item->category_id) && $item->category_id == $itemCategory->id) selected @endif>
                                {{ $itemCategory->name }}
                            </option>
                        @endforeach
                    @endslot
                @endisset
                @error('category_id')
                    @include('includes.error-field', ['error' => $message])
                @enderror
            @endcomponent


            @component('components.input-field')
                @slot('input_label', 'Kapasitas')
                @slot('input_type', 'number')
                @slot('input_name', 'capacity')
                @isset($item->capacity)
                    @slot('input_value')
                        {{ $item->capacity }}
                    @endslot
                @endisset
            @endcomponent

            @component('components.input-field')
                @slot('input_label', 'Harga')
                @slot('input_type', 'text')
                @slot('input_name', 'price')
                @slot('input_id', 'price-input')
                @isset($item->price)
                    @slot('input_value')
                        @if ($item->price)
                            {{ number_format($item->price, 0, ',', '.') }}
                        @else
                            '-'
                        @endif
                    @endslot
                @endisset
            @endcomponent




            @component('components.input-field')
                @slot('input_label', 'Foto')
                @slot('input_type', 'file')
                @slot('input_name', 'photo[]')
                @if (isset($item))
                    @slot('help_text',
                        'Tidak perlu input foto jika tidak ingin mengeditnya | Upload gambar sekaligus, dengan ukuran
                        maksimal 2MB')
                    @else
                        @slot('help_text', 'Upload gambar sekaligus, dengan ukuran maksimal 2MB')
                    @endif

                    @slot('other_attributes')
                        accept="image/*" multiple
                    @endslot
                @endcomponent

            @endslot

            @slot('card_footer', 'true')
            @slot('card_footer_class', 'text-right')
            @slot('card_footer_content')
                @include('includes.save-cancel-btn')
            @endslot
        @endcomponent

    @endsection

    @push('after-script')
        <script>
            // Mendapatkan input field dengan id 'price-input'
            const priceInput = document.getElementById('price-input');

            // Format rupiah dengan tanda "." setiap 3 digit
            priceInput.addEventListener('input', function(e) {
                // Mengambil nilai input field
                let value = e.target.value;

                // Hilangkan semua karakter kecuali angka
                value = value.replace(/\D/g, '');

                // Format angka dengan tanda "." setiap 3 digit
                value = value.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');

                // Assign kembali nilai yang sudah diformat ke input field
                e.target.value = value;
            });
        </script>
    @endpush
