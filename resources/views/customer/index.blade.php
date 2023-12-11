@extends("layouts/main")

@section('content')
<h1 class="h3 mb-4 text-gray-800">Customers</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Customers</h6>
    </div>
    <div class="card-body">
        {{-- <a href="{{route('class.create')}}" class="btn btn-success mb-3">Add New</a> --}}

        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="list-data" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customers</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row["fullname"] }}</td>
                        <td>{{ $row["email"] }}</td>
                        <td>{{ $row["phone"] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
