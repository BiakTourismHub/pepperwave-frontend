<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CustomerController extends Controller
{
    public function index()
    {
        $req = Http::withHeaders([
            'Authorization' => session('token_auth'),
        ])->get(env('API_URL').'/customers');

        $customers = $req->json();

        return view("customer.index",  ["customers" => $customers["data"]]);
    }
}
