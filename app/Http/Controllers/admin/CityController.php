<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Searchable;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\View\View;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Searchable;
    public function index() : View
    {
        $query = City::query();
        $query->with(['country', 'state']);
        $this->search($query, ['name']);
        $cities = $query->orderBy('id','DESC')->paginate(20);
        return view('admin.location.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $countries = Country::all();
        $states = State::all();
        return view('admin.location.cities.create' ,compact('states', 'countries'));
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
