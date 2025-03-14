<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CompanyInfoUpdateRequest;
use App\Http\Requests\Frontend\CompanyFoundingInfoUpdateRequest;;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Company;
use App\Traits\FileUploadTraits;
use Illuminate\Validation\Rules;
use Auth;
use Illuminate\Http\RedirectResponse;

class CompanyProfileController extends Controller
{
    use FileUploadTraits;
    function index() : View{
        $companyInfo = Company::where('user_id', auth()->user()->id)->first();

        return view ('frontend.company-dashboard.profile.index', compact('companyInfo'));
    }

    function updateCompanyInfo(CompanyInfoUpdateRequest $request) : RedirectResponse{

        $logoPath = $this->uploadFile($request, 'logo');
        $bannerPath = $this->uploadFile($request, 'banner');

        $data = [];
        if(!empty($logoPath)) $data['logo'] = $logoPath;
        if(!empty($bannerPath)) $data['banner'] = $bannerPath;
        $data['name'] = $request->name;
        $data['bio'] = $request->bio;
        $data['vision'] = $request->vision;

        Company::updateOrCreate(['user_id' => auth()->user()->id], $data);

        notify()->success('Company information updated successfully');

        return redirect()->back();


    }

    function updateFoundingInfo( CompanyFoundingInfoUpdateRequest $request) : RedirectResponse {

  Company::updateOrCreate(['user_id' => auth()->user()->id],
    [
        'industry_type_id' => $request->industry_type,
        'organization_type_id' => $request->organization_type,
        'team_size_id' => $request->team_size,
        'establishment_date' => $request->establishment_date,
        'website' => $request->website,
        'phone' => $request->phone,
        'address' => $request->address,
        'email' => $request->email,
        'city' => $request->city,
        'state' => $request->state,
        'country' => $request->country,
        'map_link' => $request->map_link,

    ]
    );

    notify()->success('Company founding information updated successfully');
        return redirect()->back();
    }

    function updateAccountInfo(Request $request) : RedirectResponse {
       $validatedData = $request->validate([
       'name'=> ['required','string', 'max:255'],
        'email'  =>  ['required', 'email'],
       ]);
       Auth::user()->update($validatedData);
       notify()->success('Account information updated successfully');
       return redirect()->back();
    }

    function updatePassword(Request $request) : RedirectResponse {
        $validatedPassword = $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        Auth::user()->update(['password' => bcrypt($validatedPassword['password'])]);
        notify()->success('Password updated successfully');
        return redirect()->back();
    }
}
