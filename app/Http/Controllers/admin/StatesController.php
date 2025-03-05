<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\Searchable;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Searchable;
    public function index() : View
    {
        $query = State::query();
        $query->with(['country']);
        $this->search($query, ['name']);
        $states = $query->paginate(10);
        return view('admin.location.states.index',compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $countries = Country::all();
        return view('admin.location.states.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        
        $request->validate([
            'state_name' => ['required', 'max:255','unique:states,name'],
            'country_name' => ['required','integer']
        ]);
        $states = new State();
        $states->name = $request->state_name;
        $states->country_id = $request->country_name;
        $states->save();
        notify()->success('State created successfully', 'Success!');
        return redirect()->route('admin.states.index');
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
        $countries = Country::all();
        $states = State::findOrFail($id);
        return view('admin.location.states.edit',compact('countries','states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      
        $states = State::findOrFail($id);
        $states->name = $request->state_name;
        $states->country_id = $request->country_name;
        $states->save();
        notify()->success('Organnization type updated successfully', 'Success!');
        return redirect()->route('admin.states.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            State::findOrFail($id)->delete();
            notify()->success('State deleted successfully', 'Success!');
        }catch(\Exception $e){
            logger($e);
            return response(['message' => 'Failed to delete state'], 500);
        }
    }
}
