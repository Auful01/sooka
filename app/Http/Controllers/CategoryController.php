<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::paginate(10);

        return view('pages.admin.category', ['data' => $data]);
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
            Storage::disk('public')->put('images/categories/' . $name, file_get_contents($image));
           }

            Category::create([
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
            $data = Category::find($id);
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
            $category = Category::find($id)->update([
                'name' => $request['name'],
                'description' => $request['description'],
                'point' => $request['point'],
            ]);

            if ($request->hasFile('image')) {
                # code...
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                Storage::disk('public')->put('images/categories/' . $name, file_get_contents($image));

                Category::find($id)->update([
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
            Category::find($id)->delete();

            return response()->json(['message' => 'Category successfully deleted'], 201);
        } catch (\Throwable $th) {
            //throw $th;

            return response()->json(['error' => $th->getMessage()], 400);
        }
    }
}
