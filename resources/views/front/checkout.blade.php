@extends('layouts.Front.app')

@section('title', __('Braga Hotel'))

@section('content')
    <!-- reservation -->

    <section class="reservation" id="reservation">

        <h1 class="heading">book now</h1>

        <form action="{{ route('my-booking-list.store') }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="container">

                <div class="box">
                    <p>Name <span>*</span></p>
                    @if (auth()->check())
                        <input type="text" class="input" value="{{ auth()->user()->name }}" placeholder="Your Name">
                    @else
                        <input type="text" class="input" placeholder="Your Name">
                    @endif
                </div>

                <div class="box">
                    <p>Kamar <span>*</span></p>
                    <select name="room_id" class="input">
                        <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                            {{ $room->name }}
                        </option>
                    </select>
                </div>



                <div class="box">
                    <p>Check in <span>*</span></p>
                    <input type="date" class="input" name="start_date" id="start_date">
                </div>

                <div class="box">
                    <p>Check Out <span>*</span></p>
                    <input type="date" class="input" name="end_date" id="end_date">
                </div>

                <div class="box">
                    <p>Keperluan <span>*</span></p>
                    <input type="text" class="input" name="purpose" id="purpose">
                </div>

                <div class="box">
                    <p>Duration <span>*</span></p>
                    <input type="text" class="input" name="duration" id="duration" readonly>
                </div>

                <div class="box">
                    <p>Person <span>*</span></p>
                    <select name="" class="input">
                        @for ($i = 1; $i <= $room->capacity; $i++)
                            <option value="{{ $i }}">{{ $i }} Person</option>
                        @endfor
                    </select>
                </div>

                <div class="box">
                    <p>Room Type <span>*</span></p>
                    <input type="text" class="input" name="" value="{{ $room->categories->name }}" readonly>
                </div>

                <div class="box">
                    <p>Price <span>*</span></p>
                    <input type="text" class="input" name="" id="price" value="{{ $room->price }}" readonly>
                </div>

                <div class="box">
                    <p>Total Price <span>*</span></p>
                    <input type="text" class="input" name="total_price" id="total_price" readonly>
                </div>




                <div class="box">

                </div>

            </div>

            <button type="submit" value="" class="btn bg-[#0077b6]">check availability</button>

        </form>

    </section>
@endsection

@push('js')
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

                if (duration === 0) {
                    duration = 1;
                } else {
                    duration = Math.ceil(duration); 
                }

                $('#duration').val(duration);
            }
        }


        function calculateTotalPrice() {
            var roomPrice = parseFloat($('#price').val());
            var duration = parseInt($('#duration').val());

            if (duration === 1) {
                var totalPrice = roomPrice;
            } else {
                var totalPrice = roomPrice * duration;
            }

            $('#total_price').val(totalPrice.toFixed(0));
        }
    </script>
@endpush
