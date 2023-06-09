@extends('layouts.main')

@section('title')
    @if (isset($item))
        Edit Data Event - Braga Hotel
    @else
        Tambah Data Event - Braga Hotel
    @endif
@endsection

@section('header-title')
    @if (isset($item))
        Edit Data Event
    @else
        Tambah Data Event
    @endif
@endsection

@section('breadcrumbs')
    <div class="breadcrumb-item"><a href="#">Event</a></div>
    <div class="breadcrumb-item"><a href="{{ route('events.index') }}">Data Event</a></div>
    <div class="breadcrumb-item @if (isset($item)) '' @else 'active' @endif">
        @if (isset($item))
            <a href="#">Edit Data Event</a>
        @else
            Tambah Data Event
        @endif
    </div>
    @isset($item)
        <div class="breadcrumb-item active">{{ $item->title }}</div>
    @endisset
@endsection

@section('section-title')
    @if (isset($item))
        Edit Data Event
    @else
        Tambah Data Event
    @endif
@endsection

@section('section-lead')
    Silakan isi form di bawah ini untuk @if (isset($item))
        mengedit data {{ $item->title }}
    @else
        menambah data Event.
    @endif
@endsection

@section('content')

    @component('components.form')
        @slot('row_class', 'justify-content-center')
        @slot('col_class', 'col-12 col-md-6')

        @if (isset($item))
            @slot('form_method', 'POST')
            @slot('method', 'PUT')
            @slot('form_action', 'events.update')
            @slot('update_id', $item->id)
        @else
            @slot('form_method', 'POST')
            @slot('form_action', 'events.store')
        @endif

        @slot('is_form_with_file', 'true')

        @slot('input_form')

            @component('components.input-field')
                @slot('form_row', 'open')
                @slot('col', 'col-md-6')
                @slot('input_label', 'Judul Kegiatan')
                @slot('input_type', 'text')
                @slot('input_name', 'title')
                @isset($item->title)
                    @slot('input_value')
                        {{ $item->title }}
                    @endslot
                @endisset
                @isset($item)
                    @slot('other_attributes', '')
                @endisset
                @empty($item)
                    @slot('form_group_class', 'col required')
                    @slot('other_attributes', 'required autofocus')
                @endempty
            @endcomponent

            @component('components.input-field')
                @slot('form_row', 'close')
                @slot('col', 'col-md-6')
                @slot('input_label', 'Tanggal Kegiatan')
                @slot('input_type', 'text')
                @slot('input_id', 'date')
                @slot('input_name', 'date')
                @slot('input_classes', 'datepicker')
                @isset($item->date)
                    @slot('input_value')
                        {{ $item->date }}
                    @endslot
                @endisset
                @slot('form_group_class', 'col required')
                @slot('other_attributes', 'required')
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

@push('after-style')
    {{-- datepicker  --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    {{-- datepicker  --}}
@endpush

@push('after-script')
    {{-- datepicker  --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    {{-- datepicker  --}}
@endpush
