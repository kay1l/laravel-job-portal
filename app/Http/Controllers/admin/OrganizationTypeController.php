<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrganizationType;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrganizationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View {
        $organizationType = OrganizationType::all();
        return view ('admin.organization-type.index', compact('organizationType'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.organization-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'organization_name' =>['required','string','max:255','unique:organization_types,name'],
        ]);
        $type = new OrganizationType();
        $type->name = $request->organization_name;
        $type->save();
        notify()->success('organization type created successfully', 'Success!');
        return to_route('admin.organization-types.index');
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
        $organizationType = OrganizationType::findOrFail($id);
        return view('admin.organization-type.edit', compact('organizationType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'organization_name' => ['required','string','max:255','unique:organization_types,name,' . $id]
        ]);
        $type = OrganizationType::findOrFail($id);
        $type->name = $request->organization_name;
        $type->save();
        notify()->success('Organnization type updated successfully', 'Success!');
        return to_route('admin.organization-types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            OrganizationType::findOrFail($id)->delete();
            notify()->success('Organization type deleted successfully', 'Success!');
        }catch(\Exception $e){
            logger($e);
            return response(['message' => 'Failed to delete organization type'], 500);
        }
    }
}
