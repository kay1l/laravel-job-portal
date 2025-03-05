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
                        <h4>Create Industry Type</h4>


                    </div>
                    <div class="card-body ">
                        <form action="{{route('admin.industry-types.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="industry_name">Industry Name</label>
                                <input type="text" class="form-control {{$errors->has('industry_name') ? 'is-invalid' : '' }}"  id="industry_name" name="industry_name">
                                <x-input-error :messages="$errors->get('industry_name')" class="mt-2" />
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                </div>
            </div>
        </div>
            </div>

    </section>
@endsection
