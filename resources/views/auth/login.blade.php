

@extends('frontend.layouts.master')

@section('content')
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

    <section class="pt-120 login-register">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12 mx-auto">
                    <div class="login-register-cover">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <div class="text-center">
                            <h2 class="mb-5 text-brand-1">Login</h2>
                            <p class="font-sm text-muted mb-30"> Please provide with your valid Credentials.</p>
                        </div>
                        <form class="login-register text-start mt-20" method="post" action="{{route('login')}}">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-3">Email *</label>
                                        <input class="form-control" {{$errors->has('email') ? 'is-invalid' : ''}} id="input-3" class="block mt-1 w-full" type="email"
                                            name="email" :value="old('email')" required autofocus autocomplete="username"
                                            placeholder="stevenjob" value="{{old('email')}}">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-4">Password *</label>
                                        <input class="form-control"  {{ $errors->has('password') ? 'is-invalid' : ''}} id="password" class="block mt-1 w-full" type="password"
                                            name="password" required autocomplete="current-password"
                                            placeholder="************">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" style="margin-right: 7px" type="checkbox" name="remember" id="remember_me" value="candidate">
                                    <label class="form-check-label" for="typeCandidate">Remember Me</label>
                            </div>
                        </div>
                            <div class="form-group">
                                <button class="btn btn-default hover-up w-100" type="submit" name="login">Login</button>
                            </div>
                            <div class="text-muted text-center">Don't have an account?
                                <a href="{{route('register')}}">Registration</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mt-120"></div>
@endsection
