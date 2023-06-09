@extends('layouts.Front.app')

@section('title', __('Braga Hotel'))

@section('content')


    <!-- reservation -->

    <section class="reservation" id="reservation" style="margin-top: 100px">

        <h1 class="heading">book now</h1>

        <form action="">

            <div class="container">

                <div class="box">
                    <p>name <span>*</span></p>
                    <input type="text" class="input" placeholder="Your Name">
                </div>

                <div class="box">
                    <p>email <span>*</span></p>
                    <input type="text" class="input" placeholder="Your Email">
                </div>

                <div class="box">
                    <p>check in <span>*</span></p>
                    <input type="date" class="input">
                </div>

                <div class="box">
                    <p>check out <span>*</span></p>
                    <input type="date" class="input">
                </div>

                <div class="box">
                    <p>adults <span>*</span></p>
                    <select name="adults" class="input">
                        <option value="1">1 adults</option>
                        <option value="2">2 adults</option>
                        <option value="3">3 adults</option>
                        <option value="4">4 adults</option>
                        <option value="5">5 adults</option>
                        <option value="6">6 adults</option>
                    </select>
                </div>

                <div class="box">
                    <p>children <span>*</span></p>
                    <select name="child" class="input">
                        <option value="1">1 child</option>
                        <option value="2">2 child</option>
                        <option value="3">3 child</option>
                        <option value="4">4 child</option>
                        <option value="5">5 child</option>
                        <option value="6">6 child</option>
                    </select>
                </div>


                <div class="box">
                    <p>room type <span>*</span></p>
                    <select name="type" class="input">
                        <option value="1">exclusive rooms</option>
                        <option value="2">family rooms</option>
                        <option value="3">daily rooms</option>
                        <option value="4">panoramic rooms</option>
                    </select>
                </div>

            </div>

            <button type="submit" value="" class="btn bg-[#0077b6]">check availability</button>

        </form>

    </section>

    <!-- end -->

@endsection
