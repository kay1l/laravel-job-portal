@extends('frontend.layouts.master')

@section('content')
    <style>
        .nav-pills .nav-link.active {
            background-color: #1ca774 !important;
            color: black !important;
            border-radius: 0px;
        }

        .nav-pills .nav-link {
            border-radius: var(--bs-nav-pills-border-radius);
            color: #05264e;
        }
    </style>

    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Blog</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="index.html">Home</a></li>
                            <li>Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-120">
        <div class="container">
            <div class="row">
                @include('frontend.company-dashboard.sidebar')

                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class=" nav-link active " id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Company Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class=" nav-link   "id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Founding Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class=" nav-link  "id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Account Settings</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <form action="{{ route('company.profile.company.info') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-6">
                                        <x-image-preview :height="200" :width="200" :source="$companyInfo?->logo" />
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Logo *</label>
                                            <input class="form-control {{ $errors->has('logo') ? 'is-invalid' : '' }}"
                                                type="file" value="" name="logo">
                                            <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <x-image-preview :height="200" :width="500" :source="$companyInfo?->banner" />
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Banner *</label>
                                            <input class="form-control {{ $errors->has('banner') ? 'is-invalid' : '' }}"
                                                type="file" value="" name="banner">
                                            <x-input-error :messages="$errors->get('banner')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted mb-10">Company Name *</label>
                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            type="text" value="{{ $companyInfo?->name }}" name="name">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted mb-10">Company Bio *</label>
                                        <textarea name="bio" id=""class=" {{ $errors->has('bio') ? 'is-invalid' : '' }}">{{ $companyInfo->bio }}</textarea>
                                        <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="font-sm color-text-mutted mb-10">Company Vision *</label>
                                        <textarea name="vision" id="" class=" {{ $errors->has('vision') ? 'is-invalid' : '' }}">{{ $companyInfo->vision }}</textarea>
                                        <x-input-error :messages="$errors->get('vision')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="box-button mt-15">
                                    <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <form action="{{ route('company.profile.founding.info') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Industry Type *</label>
                                            <select name="industry_type" id="industry_type"
                                                class="form-control select-active {{ $errors->has('industry_type') ? 'is-invalid' : '' }}">
                                                <option value="">Select</option>
                                                <option value="0">Test 1</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('industry_type')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Organization Type *</label>
                                            <select name="organization_type" id=""
                                                class="form-control select-active {{ $errors->has('organization_type') ? 'is-invalid' : '' }}">
                                                <option value="">Select</option>
                                                <option value="0">Test 1</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('organization_type')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Team Size *</label>
                                            <select name="team_size" id=""
                                                class="form-control select-active {{ $errors->has('team_size') ? 'is-invalid' : '' }}">
                                                <option value="">Select</option>
                                                <option value="0">Test 1</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('team_size')" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Establishment Date *</label>
                                            <input type="date"
                                                class="form-control {{ $errors->has('establishment_date') ? 'is-invalid' : '' }}"
                                                name="establishment_date"
                                                value="{{ $companyInfo?->establishment_date }}">
                                            <x-input-error :messages="$errors->get('establishment_date')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Website *</label>
                                            <input type="text" name="website"
                                                class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}"
                                                value="{{ $companyInfo?->website }}">
                                            <x-input-error :messages="$errors->get('website')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Email *</label>
                                            <input type="email" name="email"
                                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                value="{{ $companyInfo?->email }}">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Phone *</label>
                                            <input type="text" name="phone"
                                                class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                                value="{{ $companyInfo?->phone }}">
                                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Country *</label>
                                            <select name="country" id=""
                                                class="form-control select-active {{ $errors->has('country') ? 'is-invalid' : '' }}"
                                                value="{{ $companyInfo?->country }}">
                                                <option value="">Select</option>
                                                <option value="0">Test 1</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('country')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">State *</label>
                                            <select name="state" id=""
                                                class="form-control select-active {{ $errors->has('state') ? 'is-invalid' : '' }}"
                                                value="{{ $companyInfo?->state }}">
                                                <option value="">Select</option>
                                                <option value="0">Test 1</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('state')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">City *</label>
                                            <select name="city" id=""
                                                class="form-control select-active {{ $errors->has('city') ? 'is-invalid' : '' }}"
                                                value="{{ $companyInfo?->city }}">
                                                <option value="">Select</option>
                                                <option value="0">Test 1</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Address *</label>
                                            <input type="text" name="address"
                                                class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                                value="{{ $companyInfo?->address }}">
                                        </div>
                                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Map Link *</label>
                                            <input type="text" name="map_link" class="form-control "
                                                value="{{ $companyInfo?->website }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="box-button mt-15">
                                    <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">
                            <div class="row">
                                <form action="{{ route('company.profile.account.info') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-sm color-text-mutted mb-10">User Name *</label>
                                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                    value="{{ auth()->user()->name }}" name="name">
                                            </div>
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-sm color-text-mutted mb-10">Email *</label>
                                                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} "
                                                    value="{{ auth()->user()->email }}" name="email">
                                            </div>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <button class="btn btn-success">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <br>
                                <form action="{{ route('company.profile.password.update') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-sm color-text-mutted mb-10">Password *</label>
                                                <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" name="password">
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-sm color-text-mutted mb-10">Confirm Password *</label>
                                                <input type="password" class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}} " name="password_confirmation">
                                                <x-input-error :messages="$errors->get('city')" class="mt-2" />
                                            </div>
                                        </div>
                                        <div class="col md-6">
                                            <div class="form-group">
                                                <button class="btn btn-success">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
