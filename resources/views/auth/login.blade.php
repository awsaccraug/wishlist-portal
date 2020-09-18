@extends('layouts.auth')
@section('content')
<section class="login-block">
    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->

                <form class="md-float-material form-material" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="text-center">
                        @include('shared.logo')
                    </div>
                    <div class="mt-2 mx-auto" style="max-width: 450px;">
                        @if (\Session::has('duplicateEntry'))
                        <div class="alert alert-danger text-center">
                            {{ session::get('duplicateEntry') }}
                        </div>
                        @endif
                        @if (\Session::has('loginError'))
                        <div class="alert alert-danger text-center">
                            {{ session::get('loginError') }}
                        </div>
                        @endif
                        @if (\Session::has('wisherNotFound'))
                        <div class="alert alert-danger text-center">
                            {{ \Session::get('wisherNotFound') }}
                        </div>
                        @endif
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center">Member Login</h3>
                                </div>
                            </div>
                            <p class="text-inverse text-center"><b>All fields with * are required</b></p>
                            {{-- <div class="form-group form-primary">
                                <input type="text" name="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" autocomplete="email" autofocus required>
                            <span class="form-bar"></span>
                            <label class="float-label">Your Email Address*</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> --}}
                        <div class="form-group form-primary">
                            <input type="text" name="username"
                                class="form-control @error('username') is-invalid @enderror" name="username"
                                value="{{ old('username') }}" autocomplete="username" autofocus required>
                            <span class="form-bar"></span>
                            <label class="float-label">Your username*</label>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group form-primary">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            <span class="form-bar"></span>
                            <label class="float-label">Your password*</label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row m-t-25 text-left">
                            <div class="col-12">
                                <div class="checkbox-fade fade-in-primary d-">
                                    <label>
                                        <input type="checkbox" value="">
                                        <span class="cr"><i
                                                class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                        <span class="text-inverse">Remember me</span>
                                    </label>
                                </div>
                                <div class="forgot-phone text-right f-right">
                                    <a href="auth-reset-password.html" class="text-right f-w-600"> Forgot
                                        Password?</a>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <button type="submit"
                                    class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Login</button>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-10">
                                <p class="text-inverse text-left m-b-0">Thank you.</p>
                                <p class="text-inverse text-left"><a href="{{ route('welcome') }}"><b>Back to
                                            wishes</b></a></p>
                            </div>
                            {{-- <div class="col-md-2">
                                    <img src="{{ asset('files/assets/images/new-logo-small.png') }}"
                            alt="small-logo.png">
                        </div> --}}
                    </div>
            </div>
        </div>
        </form>
        <!-- end of form -->
    </div>
    <!-- end of col-sm-12 -->
    </div>
    <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>
@endsection
