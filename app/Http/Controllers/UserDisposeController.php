<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDispose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDisposeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // dd(Auth::user()->role);
        if (Auth::user()->role != "1") {
            # code...
            $data = UserDispose::with('user', 'category')->where('user_id', Auth::user()->id)->paginate(10);

        }else{
            $data = UserDispose::with('user', 'category')->paginate(10);
        }


        return view('pages.admin.user_dispose', ['data' => $data]);
    }

    public function indexMobile()
    {
        $data = UserDispose::with('user', 'category')->where('user_id', Auth::user()->id)->get();
        $metal = UserDispose::where('category_id', 1)->count();
        $plastic = UserDispose::where('category_id', 4)->count();
        return view('pages.mobile.disposed', ['data' => $data, 'metal' => $metal, 'plastic' => $plastic]);
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
            UserDispose::create([
                'user_id' => Auth::user()->id,
                'category_id' => $request['category_id'],
                'point' => $request['category_id'] == 1 ? 20 : 10,
                'status' => 'approved',
            ]);

            User::where('id', Auth::user()->id)->update([
                'point' => Auth::user()->point + ($request['category_id'] == 1 ? 10 : 20),
            ]);

            return response()->json(['message' => 'Dispose successfully added']);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            $data = UserDispose::find($id);
            return response()->json($data);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => $th->getMessage()]);
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
