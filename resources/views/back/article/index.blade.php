@extends('back.layout.template')

@section('title', 'Article')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.bootstrap5.css">
@endpush

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Article List</h1>
        </div>
        
        <div class="swal" data-swal="{{ session('success') }}"></div>
        
        <a class="btn btn-sm btn-primary" href="{{ route('articles.create') }}">Tambah Article</a>    
        
        <div class="mt-3">
            <table class="table table-bordered table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>title</th>
                        <th>Category</th>
                        <th>Slug</th>
                        <th>Views</th>
                        <th>Status</th>
                        <th>Publish Data</th>
                        <th>Posted By</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                 
                </tbody>
            </table>
        </div>
    </main>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // sweeat Alert
        const swal = $('.swal').data('swal');
        if(swal){
            Swal.fire({
                title: "Success",
                text: swal,
                icon: "success",
                showConfirmButton: false,
                timer: 1500
            });
        }

        // dataTables
        $(document).ready(function(){
            $('#dataTable').DataTable({
                processing: true,
                serverside: true,
                ajax: '{{ url()->current() }}',
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'category_id',
                        name: 'category_id'
                    },
                    {
                        data: 'slug',
                        name: 'slug'
                    },
                    {
                        data: 'views',
                        name: 'views'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'publish_date',
                        name: 'publish_date'
                    },
                    {
                        data: 'user_id',
                        name: 'user_id'
                    },
                    {
                        data:'button',
                        name:'button',
                    }
                ]
            });
        });
    </script>
@endpush