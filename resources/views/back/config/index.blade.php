@extends('back.layout.template')

@section('title', 'Bee Blog - Config')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.bootstrap5.css">
@endpush

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Configs List</h1>
        </div>
 
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">Register</button>
        
        <div class="mt-3">
            <table class="table table-bordered table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($configs as $config)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $config->name }}</td>
                            @if($config->type === 'image')
                                <td>
                                    <img src="{{ asset('storage/back/config/' . $config->value ) }}" alt="" style="height: 75px; width: 75px;">
                                </td>
                            @else
                                <td>{{ $config->value }}</td>
                            @endif
                            <td>{{ $config->created_at }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $config->id }}">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    @include('back.config._edit_modal')
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.bootstrap5.js"></script>

    <script>
        $(document).ready(function(){
            $('#dataTable').DataTable()
        })
    </script>
@endpush