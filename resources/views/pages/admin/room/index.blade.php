@extends('layouts.main')

@section('title', 'Data Ruangan - Braga Hotel')

@section('header-title', 'Data Ruangan')

@section('breadcrumbs')
    <div class="breadcrumb-item"><a href="#">Ruangan</a></div>
    <div class="breadcrumb-item active">Data Ruangan</div>
@endsection

@section('section-title', 'Ruangan')

@section('section-lead')
    Berikut ini adalah daftar seluruh ruangan.
@endsection

@section('content')

    @component('components.datatables')
        @slot('buttons')
            <a href="{{ route('room.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;Tambah Ruangan</a>
        @endslot

        @slot('table_id', 'room-table')

        @slot('table_header')
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nomor Kamar</th>
                <th>Deskripsi</th>
                <th>Kapasitas</th>
                <th>Harga</th>
                <th>Kategori</th>
            </tr>
        @endslot
    @endcomponent

@endsection

@push('after-script')
    <script>
        $(document).ready(function() {
            $('#room-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('room.json') }}',
                order: [2, 'asc'],
                columns: [{
                        name: 'DT_RowIndex',
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        name: 'photo',
                        data: 'photo',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            if (data != null) {
                                let decodedData = data.replace(/&quot;/g, '"');
                                let photos = JSON.parse(decodedData);
                                // let photos = JSON.decode(data);
                                let firstPhoto = photos.length > 0 ? photos[0] : '-';
                                return `<div class="gallery gallery-fw">` +
                                    `<a href="${firstPhoto != '-' ? '{{ asset('storage/') }}/' + firstPhoto : '#'}" data-toggle="lightbox">` +
                                    `<img src="{{ asset('storage/') }}/${firstPhoto != '-' ? firstPhoto : '#'}" class="img-fluid" style="min-width: 80px; height: auto;">` +
                                    `</a>` +
                                    '</div>';
                            } else {
                                return '-';
                            }
                        }

                    },
                    {
                        name: 'name',
                        data: 'name',
                        render: function(data, type, row) {
                            var result = row.name;

                            var is_touch_device = 'ontouchstart' in window || navigator
                                .msMaxTouchPoints;

                            if (is_touch_device) {
                                result += '<div>';
                            } else {
                                result += '<div class="table-links">';
                            }

                            result += '<a href="room/' + row.id + '/edit"' +
                                ' class="text-primary">Edit</a>'

                                +
                                ' <div class="bullet"></div>'

                                +
                                ' <a href="javascript:;" data-id="' + row.id + '" ' +
                                ' data-title="Hapus"' +
                                ' data-body="Yakin ingin menghapus ini?"' +
                                ' class="text-danger"' +
                                ' id="delete-btn"' +
                                ' name="delete-btn">Hapus' +
                                ' </a>' +
                                '</div>';

                            return result;

                        }
                    },
                    {
                        name: 'description',
                        data: 'description',
                    },
                    {
                        name: 'capacity',
                        data: 'capacity',
                    },
                    {
                        name: 'price',
                        data: 'price',
                        render: function(data, type, row) {
                            if (data) {
                                return 'IDR ' + parseFloat(data).toLocaleString('id-ID', {
                                    maximumFractionDigits: 0
                                });
                            } else {
                                return '-';
                            }
                        }
                    },
                    {
                        name: 'category_id',
                        data: 'categories.name',
                    },
                ],
            });


            $(document).on('click', '#delete-btn', function() {
                var id = $(this).data('id');
                var title = $(this).data('title');
                var body = $(this).data('body');

                $('.modal-title').html(title);
                $('.modal-body').html(body);
                $('#confirm-form').attr('action', 'room/' + id);
                $('#confirm-form').attr('method', 'POST');
                $('#submit-btn').attr('class', 'btn btn-danger');
                $('#lara-method').attr('value', 'delete');
                $('#confirm-modal').modal('show');
            });

            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
        });
    </script>

    @include('includes.lightbox')

    @include('includes.notification')

    @include('includes.confirm-modal')
@endpush
