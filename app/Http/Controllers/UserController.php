<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDispose;
use App\Models\UserExchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::paginate(10);
        return view('pages.admin.user', ['data' => $data]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = User::find($id);
            // return view('pages.admin.user_detail', ['data' => $data]);
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
        try {
            //code...
            $user = User::find($id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'username' => $request->username,
                'role' => $request->role
            ]);

            return response()->json(['message' => 'User successfully registered'], 201);
        } catch (\Throwable $th) {
            //throw $th;
            // dd();
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }


    public function myPoints(Request $request) {
        // $user = $request->session()->get('user');
        $user= Auth::user();
        $data = UserDispose::with('category')->where('user_id', $user->id)->get();
        $exch = UserExchange::with('user','exchange')->where('user_id', $user->id)->get();



        return view('pages.mobile.points', ['user' => $user, 'data' => $data, 'exch' => $exch]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function auth(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if ($user) {
            if ($user->password === $password) {
                $request->session()->put('user', $user);
                if ($user->isAdmin()) {
                    return redirect('/admin/dashboard');
                } else {
                    return redirect('/dashboard');
                }
            }
        }
    }
}
