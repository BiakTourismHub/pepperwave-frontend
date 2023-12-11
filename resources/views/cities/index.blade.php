@extends("layouts/main")

@section('content')
<h1 class="h3 mb-4 text-gray-800">Cities</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List City</h6>
    </div>
    <div class="card-body">
        <a href="{{route('cities.create')}}" class="btn btn-success mb-3">Add New</a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="list-data" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>City</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cities["data"] as $row)
                    <tr>
                        <td>{{ $row["id"]}}</td>
                        <td>{{ $row["city"] }}</td>
                        <td>
                            <div class="d-flex justify-center">
                                <a href="{{ route('cities.edit', $row['id'])}}" class="btn btn-info btn-sm mx-1">Edit</a>
                                <form id="delete-form-{{ $row['id'] }}" action="{{ route('cities.destroy', $row['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="confirmAndSubmitForm('{{ $row['id'] }}', 'Are you sure you want to delete?')">Delete</button>
                                </form>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
