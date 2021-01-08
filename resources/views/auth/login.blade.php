@extends('layouts.master')

@section('content')
    <!-- Main content-->
    <section class="content">
        <div class="container-center animated slideInDown">
            <div class="view-header">
                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-unlock"></i>
                </div>
                <div class="header-title">
                    <h3>Login</h3>
                    <small>
                        Please enter your credentials to login.
                    </small>
                </div>
            </div>

            <div class="panel panel-filled">
                <div class="panel-body">
                    <form method="POST" action="{{ route('login') }}" id="loginForm" novalidate="">
                        @csrf

                        <div class="form-group">
                            <label class="col-form-label" for="username">{{ __('Username') }}</label>
                            <input type="email" placeholder="example@gmail.com" title="Please enter you username" required autocomplete="email" value="{{ old('email') }}" name="email" id="username" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <span class="form-text small invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="password">{{ __('Password') }}</label>
                            <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <span class="form-text small invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-accent">{{ __('Login') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End main content-->
@endsection
