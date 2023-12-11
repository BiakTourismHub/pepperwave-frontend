<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $req = Http::withHeaders([
            'Authorization' => session('token_auth'),
        ])->get('http://localhost:3000/destination');

        $destination = $req->json();

        return view('dashboard.index', ["destination" => $destination["data"]]);
    }
}
