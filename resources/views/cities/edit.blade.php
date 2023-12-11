@extends("layouts/main")

@section('content')
<h1 class="h3 mb-4 text-gray-800">Cities</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Add City</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('cities.update', $city["id"]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">City Name</label>
                {{-- <input type="hidden" name="id" value="" class="form-control" placeholder="ID"> --}}
                <input type="text" name="city" value="{{$city["city"]}}" class="form-control" placeholder="Enter City Name">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection
