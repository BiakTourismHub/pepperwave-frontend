<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index(Request $request)
    {
        try {

            $response = Http::withHeaders([
                'Authorization' => session('token_auth'),
            ])->post(env('API_URL').'/city', [
                'city' => $request->city,
            ]);

            $cities = $response->json();


            return view('dashboard.index');


        } catch (\Exception $error) {
            return response()->json(['error' => $error->getMessage()], 500);
        }
    }
}
