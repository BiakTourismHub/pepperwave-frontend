@extends('layouts/main')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Booking Detail</h1>


<div class="card">
    <div class="card-body destinasi-book">
        <img src="{{ env("API_URL")."/".$destination["image"]}}" alt="{{ $destination["destination_name"] }}" width="100%" height="500">
        <h3>{{ $destination["destination_name"] }}</h3>
        <p>{{ $destination["description"] }}</p>
        <h6>Tiket: Rp {{ number_format($destination["price"],0,',','.') }}</h6>
        <form action="{{ route('booking.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Jumlah Tiket:</label>
                <input type="number" name="qty" min="1" class="form-control" placeholder="" value="1">
                <input type="hidden" name="destination_id" min="1" class="form-control" placeholder="" value="{{ $destination["id"]}}">
            </div>

            <div class="form-group">
                <input type="date" name="booking_date" class="form-control" value="{{ date('Y-m-d') }}">
            </div>

            <button class="btn btn-success w-100">Place Booking</button>
        </form>

    </div>
</div>

@endsection
