@extends('layouts/main')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Destinations</h1>

<div class="row">
    @if (!$destination)
    <div class="card ">
        <div class="card-body">
            <h1>{{ $destination == null ? "Data Not Found" : "" }}</h1>
        </div>
    </div>
    @else
        @foreach ($destination as $row)
        <div class="col-md-3">
            <div class="card">
                <div class="card-body destinasi">
                    <img src="{{ env("API_URL")."/".$row["image"]}}" alt="{{ $row["destination_name"] }}" width="100%" height="200">
                    <h3>{{ $row["destination_name"] }}</h3>
                    <p>{{ substr($row["description"],0,250) }}...</p>
                    <h6>Tiket: Rp {{ number_format($row["price"],0,',','.') }}</h6>
                    <a href="{{ route('booking.show', $row['id'])}}" class="btn btn-success w-100">Book Ticket</a>
                </div>
            </div>
        </div>
        @endforeach
    @endif

</div>

@endsection
