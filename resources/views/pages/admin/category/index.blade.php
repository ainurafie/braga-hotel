@extends('layouts.main')

@section('title', 'Data Kategori - Braga Hotel')

@section('header-title', 'Data Kategori')
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">Kategori</a></div>
  <div class="breadcrumb-item active">Data Kategori</div>
@endsection

@section('section-title', 'Kategori')
    
@section('section-lead')
  Berikut ini adalah daftar seluruh kategori.
@endsection

@section('content')

  @component('components.datatables')

    @slot('buttons')
      <a href="{{ route('category.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;Tambah Kategori</a>
    @endslot
    
    @slot('table_id', 'category-table')

    @slot('table_header')
      <tr>
        <th>#</th>
        <th>Kategori Ruangan</th>
      </tr>
    @endslot
      
  @endcomponent

@endsection

@push('after-script')

  <script>
  $(document).ready(function() {
    $('#category-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{{ route('category.json') }}',
      order: [1, 'asc'],
      columns: [
      {
        name: 'DT_RowIndex',
        data: 'DT_RowIndex',
        orderable: false, 
        searchable: false
      },
      {
        name: 'name',
        data: 'name',
        render: function ( data, type, row ) {
          var result = row.name;

          var is_touch_device = 'ontouchstart' in window || navigator.msMaxTouchPoints;

          if (is_touch_device) {
            result += '<div>';
          } else {
            result += '<div class="table-links">';
          }

          result += '<a href="category/'+row.id+'/edit"'
          + ' class="text-primary">Edit</a>'

          + ' <div class="bullet"></div>'

          + ' <a href="javascript:;" data-id="'+row.id+'" '
          + ' data-title="Hapus"'
          + ' data-body="Yakin ingin menghapus ini?"'
          + ' class="text-danger"'
          + ' id="delete-btn"'
          + ' name="delete-btn">Hapus'
          + ' </a>'
          + '</div>';

          return result;
            
        }
      },
    ],
    });
  

    $(document).on('click', '#delete-btn', function() {
      var id    = $(this).data('id'); 
      var title = $(this).data('title');
      var body  = $(this).data('body');

      $('.modal-title').html(title);
      $('.modal-body').html(body);
      $('#confirm-form').attr('action', 'category/'+id);
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