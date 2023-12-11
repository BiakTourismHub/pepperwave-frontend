<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DestinationController extends Controller
{
    public function index()
    {
        $req = Http::withHeaders([
            'Authorization' => session('token_auth'),
        ])->get('http://localhost:3000/destination');

        $destination = $req->json();

        return view('destination.index', ["destination" => $destination["data"]]);
    }
}
