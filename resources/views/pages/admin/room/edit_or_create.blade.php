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

            @component('components.input-field')
                @slot('input_label', 'Nama')
                @slot('input_type', 'text')
                @slot('input_name', 'name')
                @isset($item->name)
                    @slot('input_value')
                        {{ $item->name }}
                    @endslot
                @endisset
                @isset($item)
                    @slot('other_attributes', 'disabled')
                @endisset
                @empty($item)
                    @slot('form_group_class', 'required')
                    @slot('other_attributes', 'required autofocus')
                @endempty
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
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}" @if (isset($category_id) && $category_id == $item->id) selected @endif>{{ $item->name }}</option>
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
                        {{ $item->price }}
                    @endslot
                @endisset
            @endcomponent


            @component('components.input-field')
                @slot('input_label', 'Foto')
                @slot('input_type', 'file')
                @slot('input_name', 'photo')
                @isset($item)
                    @slot('help_text', 'Tidak perlu input foto jika tidak ingin mengeditnya')
                @endisset
                @slot('input_attributes')
                    accept="image/*"
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
        const priceInput = document.getElementById('price-input');

        priceInput.addEventListener('input', function(e) {
            let value = e.target.value;

            value = value.replace(/\D/g, '');

            e.target.value = value;
        });
    </script>
@endpush
