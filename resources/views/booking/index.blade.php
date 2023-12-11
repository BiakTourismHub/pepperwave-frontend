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
                        <th>Customers</th>
                        <th>Destination</th>
                        <th>Booking Date</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($booking as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row["customer_name"] }}</td>
                        <td>{{ $row["destination_name"] }}</td>
                        <td>{{ $row["booking_date"] }}</td>
                        <td>{{ $row["price"] }}</td>
                        <td>{{ $row["qty"] }}</td>
                        <td>{{ $row["price"]*$row["qty"] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
