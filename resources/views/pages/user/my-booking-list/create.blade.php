@extends('layouts.main')

@section('title')
    Buat Booking - Braga Hotel
@endsection

@section('header-title')
    Buat Booking
@endsection

@section('breadcrumbs')
    <div class="breadcrumb-item"><a href="#">Transaksi</a></div>
    <div class="breadcrumb-item"><a href="{{ route('my-booking-list.index') }}">My Booking</a></div>
    <div class="breadcrumb-item active">
        Buat Booking
    </div>
@endsection

@section('section-title')
    Buat Booking
@endsection

@section('section-lead')
    Silakan isi form di bawah ini untuk membuat booking.
@endsection

@section('content')

    @component('components.form')
        @slot('row_class', 'justify-content-center')
        @slot('col_class', 'col-12 col-md-6')

        @slot('form_method', 'POST')
        @slot('form_action', 'my-booking-list.store')

        @slot('input_form')

            @component('components.input-field')
                @slot('input_label', 'Nama Ruangan')
                @slot('input_type', 'select')
                @slot('select_content')
                    <option value="">Pilih Ruangan</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" data-price="{{ $room->price }}"
                            {{ old('room_id') == $room->id ? 'selected' : '' }}>
                            {{ $room->name }}
                        </option>
                    @endforeach
                @endslot
                @slot('input_name', 'room_id')
                @slot('input_id', 'room_id')
                @slot('form_group_class', 'required')
                @slot('other_attributes', 'required autofocus')
            @endcomponent

            @component('components.input-field')
                @slot('form_row', 'open')
                @slot('col', 'col-md-6')
                @slot('input_label', 'Tanggal Check-in')
                @slot('input_type', 'text')
                @slot('input_id', 'start_date')
                @slot('input_name', 'start_date')
                @slot('input_classes', 'datepicker')
                @slot('form_group_class', 'col required')
                @slot('other_attributes', 'required')
            @endcomponent

            @component('components.input-field')
                @slot('form_row', 'close')
                @slot('col', 'col-md-6')
                @slot('input_label', 'Tanggal Check-out')
                @slot('input_type', 'text')
                @slot('input_id', 'end_date')
                @slot('input_name', 'end_date')
                @slot('input_classes', 'datepicker')
                @slot('form_group_class', 'col required')
                @slot('other_attributes', 'required')
            @endcomponent

            @component('components.input-field')
                @slot('input_label', 'Keperluan')
                @slot('input_type', 'text')
                @slot('input_name', 'purpose')
                @slot('form_group_class', '')
                @slot('other_attributes', '')
            @endcomponent

            @component('components.input-field')
                @slot('input_label', 'Durasi Menginap')
                @slot('input_type', 'number')
                @slot('input_id', 'duration')
                @slot('input_name', 'duration')
                @slot('input_classes', 'form-control')
                @slot('other_attributes', 'required readonly')
            @endcomponent

            @component('components.input-field')
                @slot('input_label', 'Harga Total')
                @slot('input_type', 'number')
                @slot('input_name', 'total_price')
                @slot('input_id', 'total_price')
                @slot('form_group_class', '')
                @slot('other_attributes', 'readonly')
            @endcomponent




            {{-- @component('components.input-field')
                @slot('form_row', 'open')
                @slot('col', 'col-md-6')
                @slot('input_label', 'Waktu Mulai')
                @slot('input_type', 'text')
                @slot('input_id', 'start_time')
                @slot('input_name', 'start_time')
                @slot('placeholder', 'HH:mm')
                @slot('input_classes', 'timepicker')
                @slot('form_group_class', 'col required')
                @slot('other_attributes', 'required')
            @endcomponent

            @component('components.input-field')
                @slot('form_row', 'close')
                @slot('col', 'col-md-6')
                @slot('input_label', 'Waktu Selesai')
                @slot('input_type', 'text')
                @slot('input_id', 'end_time')
                @slot('input_name', 'end_time')
                @slot('placeholder', 'HH:mm')
                @slot('input_classes', 'timepicker')
                @slot('form_group_class', 'col required')
                @slot('other_attributes', 'required')
            @endcomponent --}}

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

    <script>
        $(document).ready(function() {
            $('#start_date, #end_date').on('change', function() {
                calculateDuration();
                calculateTotalPrice();
            });
        });

        function calculateDuration() {
            var startDate = new Date($('#start_date').val());
            var endDate = new Date($('#end_date').val());

            if (!isNaN(startDate) && !isNaN(endDate)) {
                var duration = (endDate - startDate) / (1000 * 60 * 60 * 24);
                $('#duration').val(duration.toFixed(0));
            }
        }

        function calculateTotalPrice() {
            var roomPrice = parseFloat($('#room_id option:selected').data('price'));
            var duration = parseInt($('#duration').val());
            var totalPrice = roomPrice * duration;

            console.log(roomPrice);
            console.log(duration);

            $('#total_price').val(totalPrice.toFixed(0));

        }
    </script>

    {{-- <script>
        function calculateTotalPrice() {
            var roomPrice = parseFloat($('#room_id option:selected').data('price'));
            var duration = parseInt($('#duration').val());
            var totalPrice = roomPrice * duration;
            console.log(duration);
            $('#total_price').val(totalPrice.toFixed(2));
        }

        $(document).ready(function() {
            // Event listener untuk menghitung total_price ketika room_id atau duration berubah
            $('#room_id, #duration').change(function() {
                calculateTotalPrice();
            });

            // Inisialisasi perhitungan total_price saat halaman dimuat
            calculateTotalPrice();
        });
    </script> --}}
@endpush

@include('includes.notification')
