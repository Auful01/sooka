<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Exchange;
use App\Models\User;
use App\Models\UserDispose;
use App\Models\UserExchange;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'total_users' => User::count(),
            'total_exchanges' => Exchange::count(),
            'total_categories' => Category::count(),
            'total_transaction' => UserExchange::count(),
            'total_dispose' => UserDispose::count(),
        ];

        return view('pages.admin.dashboard', ['data' => $data]);
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
        //
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
