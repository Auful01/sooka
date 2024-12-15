<?php

namespace App\Http\Controllers;

use App\Models\Exchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Exchange::paginate(10);
        // dd($data);

        if (Auth::user()->role != '1') {
            # code...
            return view('pages.exchange', ['data' => $data]);
        }else{
            return view('pages.admin.exchange', ['data' => $data]);
        }
        // try {
        // } catch (\Throwable $th) {
        //     //throw $th;
        // }
    }

    public function indexMobile(Request $request)
    {
        $data = Exchange::all();
        // dd($data);

        return view('pages.mobile.catalogue', ['data' => $data]);
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
            $name = '';
           if ($request->hasFile('image')) {
            # code...
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->put('images/exchange/' . $name, file_get_contents($image));
           }

            Exchange::create([
                'name' => $request['name'],
                'image' => $name,
                'description' => $request['description'],
                'point' => $request['point'],
            ]);

            return redirect()->back()->with('success', 'Exchange successfully added');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $data = Exchange::find($id);

            return response()->json($data);

        } catch (\Throwable $th) {
            //throw $th;

            return response()->json(['error' => $th->getMessage()], 400);
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
            $category = Exchange::find($id)->update([
                'name' => $request['name'],
                'description' => $request['description'],
                'point' => $request['point'],
            ]);

            if ($request->hasFile('image')) {
                # code...
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                Storage::disk('public')->put('images/exchange/' . $name, file_get_contents($image));

                Exchange::find($id)->update([
                    'image' => $name,
                ]);
            }

            return response()->json(['message' => 'Category successfully updated'], 201);
        } catch (\Throwable $th) {
            //throw $th;
            // dd();
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            //code...
            Exchange::find($id)->delete();

            return response()->json(['message' => 'Category successfully deleted'], 201);
        } catch (\Throwable $th) {
            //throw $th;

            return response()->json(['error' => $th->getMessage()], 400);
        }
    }
}
