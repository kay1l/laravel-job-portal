@extends('admin.layouts.master')

@section('contents')
    <style>
        .card .card-header h4+.card-header-action,
        .card .card-header h4+.card-header-form {
            margin-left: auto;
            margin-inline: auto;
        }

    </style>
    <section class="section">
        <div class="section-header">
            <h1>Industry Type</h1>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Industry Type</h4>


                    </div>
                    <div class="card-body ">
                        <form action="{{route('admin.states.update', $states->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="country_name">Country</label>
                                    <select name="country_name" id="country_name" class="form-control select2 {{$errors->has('country_name') ? 'is-invalid' : '' }}">
                                        <option value="">Select</option>
                                        @foreach($countries as $country)
                                            <option @selected($states->country_id === $country->id) value="{{$country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('country_name')" class="mt-2" />
                                </div>
                            </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="industry_name">State Name</label>
                                    <input type="text" class="form-control {{$errors->has('state_name') ? 'is-invalid' : '' }}"  id="state_name" name="state_name" value="{{old('name', $states->name)}}">
                                    <x-input-error :messages="$errors->get('state_name')" class="mt-2" />
                                </div>
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                </div>
            </div>
        </div>
            </div>

    </section>
@endsection
