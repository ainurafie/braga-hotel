@extends('layouts.main')

@section('title', 'Booking List - Braga Hotel')

@section('header-title', 'Booking List')

@section('breadcrumbs')
    <div class="breadcrumb-item"><a href="#">Transaksi</a></div>
    <div class="breadcrumb-item active">Booking List</div>
@endsection

@section('section-title', 'Booking List')

@section('section-lead')
    Berikut ini adalah daftar seluruh booking dari setiap user.
@endsection

@section('content')

    @component('components.datatables')
        @slot('table_id', 'booking-list-table')

        @slot('table_header')
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Ruangan</th>
                <th>User</th>
                <th>Durasi</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Keperluan</th>
                <th>Status</th>
            </tr>
        @endslot
    @endcomponent

@endsection

@push('after-script')
    <script src="//cdn.datatables.net/plug-ins/1.10.22/dataRender/ellipsis.js"></script>

    <script>
        $(document).ready(function() {
            $('#booking-list-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('booking-list.json') }}',
                columnDefs: [{
                        targets: [4],
                        orderData: [4, 5]
                    },
                    {
                        targets: [5],
                        orderData: [5, 4]
                    },
                    {
                        targets: 7,
                        render: $.fn.dataTable.render.ellipsis(20, true)
                    },
                ],
                order: [
                    [4, 'desc'],
                    [5, 'desc']
                ],
                columns: [{
                        name: 'DT_RowIndex',
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        name: 'room.photo',
                        data: 'room.photo',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            if (data != null) {
                                return `<div class="gallery gallery-fw">` +
                                    `<a href="{{ asset('storage/${data}') }}" data-toggle="lightbox">` +
                                    `<img src="{{ asset('storage/${data}') }}" class="img-fluid" style="min-width: 80px; height: auto;">` +
                                    `</a>` +
                                    '</div>';
                            } else {
                                return '-'
                            }
                        }
                    },
                    {
                        name: 'room.name',
                        data: 'room.name',
                        orderable: false,
                        render: function(data, type, row) {
                            var result = data;

                            var now = new Date();

                            var is_touch_device = 'ontouchstart' in window || navigator
                                .msMaxTouchPoints;

                            if (is_touch_device) {
                                result += '<div>';
                            } else {
                                result += '<div class="table-links">';
                            }

                            if (row.status === 'PENDING' || row.status === 'DITOLAK') {
                                result += ' <a href="javascript:;" data-id="' + row.id + '" ' +
                                    'data-title="Setujui" ' +
                                    'data-body="Yakin setujui booking ini?" ' +
                                    'data-value="1" ' +
                                    'class="text-primary" ' +
                                    'id="acc-btn" ' +
                                    'name="acc-btn">Setujui' +
                                    '</a>';
                            }

                            if (row.status === 'PENDING') {
                                result += '<div class="bullet"></div>';
                            }

                            if (row.status === 'PENDING' || row.status === 'DISETUJUI') {
                                result += ' <a href="javascript:;" data-id="' + row.id + '" ' +
                                    'data-title="Tolak" ' +
                                    'data-body="Yakin tolak booking ini?" ' +
                                    'data-value="0" ' +
                                    'class="text-danger" ' +
                                    'id="deny-btn" ' +
                                    'name="deny-btn">Tolak' +
                                    '</a> ' +
                                    '<div class="bullet"></div>';
                            }

                            result += '</div>';

                            return result;
                        }

                    },
                    {
                        name: 'user.name',
                        data: 'user.name',
                        orderable: false,
                    },
                    {
                        name: 'duration',
                        data: 'duration',
                    },
                    {
                        name: 'start_date',
                        data: 'start_date',
                    },
                    {
                        name: 'end_date',
                        data: 'end_date',
                    },
                    {
                        name: 'purpose',
                        data: 'purpose',
                    },
                    {
                        name: 'status',
                        data: 'status',
                        render: function(data, type, row) {
                            var result = `<span class="badge badge-`;

                            if (data === 'PENDING')
                                result += `info`;
                            else if (data === 'DISETUJUI')
                                result += `primary`;
                            else if (data === 'DIGUNAKAN')
                                result += `primary`;
                            else if (data === 'DITOLAK')
                                result += `danger`;
                            else if (data === 'EXPIRED')
                                result += `warning`;
                            else if (data === 'BATAL')
                                result += `warning`;
                            else if (data === 'SELESAI')
                                result += `success`;

                            result += `">${data}</span>`;

                            return result;
                        }
                    },
                ],
            });

            $(document).on('click', '#acc-btn, #deny-btn', function() {
                var id = $(this).data('id');
                var title = $(this).data('title');
                var body = $(this).data('body');
                var value = $(this).data('value');

                var submit_btn_class = (value === 1) ? 'btn btn-primary' : 'btn btn-danger';

                $('.modal-title').html(title);
                $('.modal-body').html(body);
                $('#confirm-form').attr('action', '/admin/booking-list/' + id + '/update/' + value);
                $('#confirm-form').attr('method', 'POST');
                $('#submit-btn').attr('class', submit_btn_class);
                $('#lara-method').attr('value', 'put');
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
