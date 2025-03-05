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
            <h1>Country Type</h1>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Country </h4>


                    </div>
                    <div class="card-body ">
                        <form action="{{route('admin.countries.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="country_name">Country Name</label>
                                <input type="text" class="form-control {{$errors->has('country_name') ? 'is-invalid' : '' }}"  id="country_name" name="country_name">
                                <x-input-error :messages="$errors->get('country_name')" class="mt-2" />
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                </div>
            </div>
        </div>
            </div>

    </section>
@endsection
