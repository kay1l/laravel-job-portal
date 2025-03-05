<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Searchable;
use App\Models\Country;
use Illuminate\View\View;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Searchable;
    public function index(Request $request) : View
    {
        $query = Country::query();
        $this->search($query, ['name']);
        $countries = $query->paginate(10);
        return view ('admin.location.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.location.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_name' => ['required', 'max:255', 'unique:countries,name']
        ]);
        $country = new Country();
        $country->name = $request->country_name;
        $country->save;
        notify()->success('Country created successfully', 'Success!');
        return to_route('admin.countries.index');
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
    public function edit(string $id) : View
    {
        $countries = Country::findOrFail($id);
        return view('admin.location.countries.edit', compact('countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'country_name' => ['required','max:255','unique:countries,name,'.$id]
        ]);
        $country = Country::findOrFail($id);
        $country->name = $request->country_name;
        $country->save();
        notify()->success('Country updated successfully', 'Success!');
        return to_route('admin.countries.index');
    }

    public function destroy(string $id)
    {
        try{
            Country::findOrFail($id)->delete();
            notify()->success('Country deleted successfully', 'Success!');
            return response(['message' => 'success'], 200);
        } catch (\Exception $e){
            logger($e);
            return response(['message' => 'Failed to delete country'], 500);
        }
    }
}
