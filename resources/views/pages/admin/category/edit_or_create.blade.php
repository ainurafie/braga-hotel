@extends('layouts.main')

@section('title')
    @if (isset($item))
        Edit Data Kategori Ruangan - Braga Hotel
    @else
        Tambah Data Kategori Ruangan - Braga Hotel
    @endif
@endsection

@section('header-title')
    @if (isset($item))
        Edit Data Kategori Ruangan
    @else
        Tambah Data Kategori Ruangan
    @endif
@endsection

@section('breadcrumbs')
    <div class="breadcrumb-item"><a href="#">Ruangan</a></div>
    <div class="breadcrumb-item"><a href="{{ route('category.index') }}">Data Kategori Ruangan</a></div>
    <div class="breadcrumb-item @if (isset($item)) '' @else 'active' @endif">
        @if (isset($item))
            <a href="#">Edit Data Kategori Ruangan</a>
        @else
            Tambah Data Kategori Ruangan
        @endif
    </div>
    @isset($item)
        <div class="breadcrumb-item active">{{ $item->name }}</div>
    @endisset
@endsection

@section('section-title')
    @if (isset($item))
        Edit Data Kategori Ruangan
    @else
        Tambah Data Kategori Ruangan
    @endif
@endsection

@section('section-lead')
    Silakan isi form di bawah ini untuk @if (isset($item))
        mengedit data {{ $item->name }}
    @else
        menambah Data Kategori Ruangan.
    @endif
@endsection

@section('content')

    @component('components.form')
        @slot('row_class', 'justify-content-center')
        @slot('col_class', 'col-12 col-md-6')

        @if (isset($item))
            @slot('form_method', 'POST')
            @slot('method', 'PUT')
            @slot('form_action', 'category.update')
            @slot('update_id', $item->id)
        @else
            @slot('form_method', 'POST')
            @slot('form_action', 'category.store')
        @endif

        @slot('is_form_with_file', 'true')

        @slot('input_form')

            @component('components.input-field')
                @slot('input_label', 'Nama Kategori Ruangan')
                @slot('input_type', 'text')
                @slot('input_name', 'name')
                @isset($item->name)
                    @slot('input_value', $item->name)
                @endisset
                @empty($item)
                    @slot('form_group_class', 'required')
                    @slot('other_attributes', 'required autofocus')
                @endempty
            @endcomponent




        @endslot

        @slot('card_footer', 'true')
        @slot('card_footer_class', 'text-right')
        @slot('card_footer_content')
            @include('includes.save-cancel-btn')
        @endslot
    @endcomponent

@endsection
