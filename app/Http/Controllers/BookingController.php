<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookingController extends Controller
{
    public function index()
    {
        $headers = [
            'Authorization' => session('token_auth'),
        ];

        $url = session('role') === 'customer'
            ? env('API_URL') . '/booking/' . session('user_id')
            : env('API_URL') . '/booking';

        $response = Http::withHeaders($headers)->get($url);
        $booking = $response->json()['data'] ?? [];

        return view('booking.index', ["booking" => $booking]);
    }


    public function show($id)
    {

        $response = Http::withHeaders([
            'Authorization' => session('token_auth'),
        ])->get(env('API_URL').'/destination/'.$id);

        $destination = $response->json();

        return view('booking.show', ["destination" => $destination["data"]]);

    }

    public function store(Request $request)
    {
        try {

            $response = Http::withHeaders([
                'Authorization' => session('token_auth'),
            ])->post(env('API_URL').'/booking', [
                'qty' => (int)$request->qty,
                'customer_id' => (int)session('user_id'),
                'destination_id' => (int)$request->destination_id,
                'booking_date' => date('Y-m-d', strtotime($request->booking_date))
            ]);

            $booking = $response->json();


            if($booking){
                return redirect('booking');
            }


        } catch (\Exception $error) {
            return response()->json(['error' => $error->getMessage()], 500);
        }
    }
}
