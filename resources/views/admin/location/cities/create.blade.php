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
            <h1>States</h1>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Cities </h4>


                    </div>
                    <div class="card-body ">
                        <form action="{{route('admin.states.store')}}" method="POST">
                            @csrf
                            <div class="row ">
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="country_name">Country</label>
                                    <select name="country_name" id="country_name" class="form-control select2 country {{$errors->has('country_name') ? 'is-invalid' : '' }}">
                                        <option value="">Select</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('country_name')" class="mt-2" />
                                </div>
                            </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="state_name">State</label>
                                    <select name="state_name" id="state_name" class="form-control select2 state {{$errors->has('state_name') ? 'is-invalid' : '' }}">
                                        <option value="">Select</option>
                                        @foreach($states as $state)
                                            <option value="{{$state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('country_name')" class="mt-2" />
                                </div>
                            </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="industry_name">State Name</label>
                                    <input type="text" class="form-control {{$errors->has('state_name') ? 'is-invalid' : '' }}"  id="state_name" name="state_name">
                                    <x-input-error :messages="$errors->get('state_name')" class="mt-2" />
                                </div>
                            </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                </div>
            </div>
        </div>
            </div>

    </section>
@endsection

@push('scripts')

<script>
    $(document).ready(function(){
        $(.country).on('change', function(){
            let country_id = $(this).val();

            $.ajax({
                method: 'get',
                url: '',
                data: {},
                success: function(response){

                },
                error: function (xhr,status,error)
            })
        })
    })
</script>
@endpush