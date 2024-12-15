<?php

namespace App\Http\Controllers;

use App\Models\Exchange;
use App\Models\User;
use App\Models\UserExchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::user()->role != '1') {
            # code...
            $data = UserExchange::with('user', 'exchange')->where('user_id', Auth::user()->id)->paginate(10);
        }else{
            $data = UserExchange::with('user', 'exchange')->paginate(10);
        }

        return view('pages.admin.user_exchange', ['data' => $data]);
    }

    public function indexMobile()
    {
        $data = UserExchange::with('user', 'exchange')->where('user_id', Auth::user()->id)->get();
        return view('pages.mobile.exchanged', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            //code...
            $exchange = Exchange::find($request['exchange_id']);

            UserExchange::create([
                'user_id' => Auth::user()->id,
                'exchange_id' => $request['exchange_id'],
                'point' => $exchange->point,
            ]);

            User::where('id', Auth::user()->id)->update([
                'point' => Auth::user()->point - $exchange->point,
            ]);

            return response()->json(['message' => 'Exchange successfully added']);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = UserExchange::with('user', 'exchange')->where('id', $id)->paginate(10);
            // return view('pages.admin.user_exchange_detail', ['data' => $data]);
            return response()->json($data);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
