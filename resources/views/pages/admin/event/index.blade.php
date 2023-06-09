@extends('layouts.main')

@section('title', 'Data Event - Braga Hotel')

@section('header-title', 'Data Event')

@section('breadcrumbs')
    <div class="breadcrumb-item"><a href="#">Event</a></div>
    <div class="breadcrumb-item active">Data Event</div>
@endsection

@section('section-title', 'Event')

@section('section-lead')
    Berikut ini adalah daftar seluruh event.
@endsection

@section('content')

    @component('components.datatables')
        @slot('buttons')
            <a href="{{ route('events.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;Tambah Event</a>
        @endslot

        @slot('table_id', 'event-table')

        @slot('table_header')
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Judul Kegiatan</th>
                <th>Tanggal</th>
            </tr>
        @endslot
    @endcomponent

@endsection

@push('after-script')
    <script>
        $(document).ready(function() {
            $('#event-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('events.json') }}',
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
                        name: 'title',
                        data: 'title',
                        render: function(data, type, row) {
                            var result = row.title;

                            var is_touch_device = 'ontouchstart' in window || navigator
                                .msMaxTouchPoints;

                            if (is_touch_device) {
                                result += '<div>';
                            } else {
                                result += '<div class="table-links">';
                            }

                            result += '<a href="events/' + row.id + '/edit"' +
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
                        name: 'date',
                        data: 'date',
                    },
                ],
            });


            $(document).on('click', '#delete-btn', function() {
                var id = $(this).data('id');
                var title = $(this).data('title');
                var body = $(this).data('body');

                $('.modal-title').html(title);
                $('.modal-body').html(body);
                $('#confirm-form').attr('action', 'events/' + id);
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
