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
            <h1>Countries Type</h1>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Countries</h4>
                        <div class="card-header-form">
                            <form action="{{ route('admin.countries.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fas fa-search"></i></button>

                                    </div>

                                </div>

                            </form>
                        </div>
                        <a href="{{ route('admin.countries.create') }}" class="btn btn-primary"> <i
                                class="fas fa-plus-circle"></i>Create New</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>

                                    <th>Country Name</th>

                                    <th style="width:10%">Action</th>
                                </tr>
                                <tbody>
                                    @foreach ($countries as $country)
                                        <tr>
                                            <td>{{ $country->name }}</td>

                                            <td>
                                                <a class="btn-sm btn-primary"
                                                    href="{{ route('admin.countries.edit', $country->id) }}"><i
                                                        class="fas fa-edit"></i></a>

                                                <a href="{{ route('admin.countries.destroy', $country->id) }}"
                                                    class="btn-sm btn-danger delete-item"><i class="fas fa-trash"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>


                            </table>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                @if ($countries->hasPages())
                                    {{ $countries->links() }}
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
