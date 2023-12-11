<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CityController extends Controller
{
    public function index()
    {
        $req = Http::withHeaders([
            'Authorization' => session('token_auth'),
        ])->get(env('API_URL').'/cities');

        $cities = $req->json();

        return view("cities.index",  ["cities" => $cities]);
    }

    public function create()
    {
        return view('cities.create');
    }

    public function store(Request $request)
    {
        try {

            $response = Http::withHeaders([
                'Authorization' => session('token_auth'),
            ])->post(env('API_URL').'/city', [
                'city' => $request->city,
            ]);

            $cities = $response->json();


            if($cities){
                return redirect('cities');
            }


        } catch (\Exception $error) {
            return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function edit($id)
    {

        $response = Http::withHeaders([
            'Authorization' => session('token_auth'),
        ])->get(env('API_URL').'/city/'.$id);

        $city = $response->json();

        return view('cities.edit', ["city" => $city["data"]]);
    }

    public function update(Request $request, $id)
    {
        try {

            $response = Http::withHeaders([
                'Authorization' => session('token_auth'),
            ])->put(env('API_URL').'/city/'.$id, [
                'city' => $request->city,
            ]);

            $cities = $response->json();

            if($cities){
                return redirect('cities');
            }


        } catch (\Exception $error) {
            return response()->json(['error' => $error->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {

            $response = Http::withHeaders([
                'Authorization' => session('token_auth'),
            ])->delete(env('API_URL').'/city/'.$id);

            $cities = $response->json();

            return redirect('cities');

        } catch (\Exception $error) {
            return response()->json(['error' => $error->getMessage()], 500);
        }
    }
}
