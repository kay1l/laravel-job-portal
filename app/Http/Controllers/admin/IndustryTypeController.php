<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndustryType;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndustryTypeController extends Controller
{
   use Searchable;
    public function index(Request $request) : View {
        $query = IndustryType::query();
        $this->search($query, ['name']);
        $industryTypes = $query->paginate(5);
        return View ('admin.industry-type.index',  compact('industryTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {

        return View('admin.industry-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'industry_name' =>['required','string','max:255','unique:industry_types,name'],
        ]);
        $type = new IndustryType();
        $type->name = $request->industry_name;
        $type->save();
        notify()->success('Industry type created successfully', 'Success!');
        return to_route('admin.industry-types.index');

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
        $industryType = IndustryType::findOrFail($id);
        return view('admin.industry-type.edit', compact('industryType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'industry_name' =>['required','string','max:255','unique:industry_types,name,' . $id],
        ]);
        $type = IndustryType::findOrFail($id);
        $type->name = $request->industry_name;
        $type->save();
        notify()->success('Industry type updated successfully', 'Success!');
        return to_route('admin.industry-types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            IndustryType::findOrFail($id)->delete();
            notify()->success('Industry type deleted successfully', 'Success!');
            return response(['message' => 'success'], 200);
        }catch (\Exception $e){
            logger($e);
            return response(['message' => 'Failed to delete industry type'], 500);
        }
    }
}
