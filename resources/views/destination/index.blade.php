@extends("layouts/main")

@section('content')
<h1 class="h3 mb-4 text-gray-800">Booking</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Booking</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="list-data" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Destination Name</th>
                        <th>Price</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($destination as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ env('API_URL')."/".$row["image"]}}" alt="{{ $row["destination_name"]}}" width="100"></td>
                        <td>{{ $row["destination_name"] }}</td>
                        <td>{{ $row["price"] }}</td>
                        <td>{{ $row["description"] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
