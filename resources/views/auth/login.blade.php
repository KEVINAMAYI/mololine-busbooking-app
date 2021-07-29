@extends('layouts.app',['backgroundcolor' => 'rgb(255,255,255)'])

@section('content')
<div class="container mt-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header" style="color:white; background-color:rgb(40,50,60); border-bottom:solid 1px white; font-weight:bold;">{{ __('Login') }}</div>

                <div class="card-body" style="background-color:rgb(40,50,60)">
                   
                    {{-- display error on top of the form --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item">
                                    {{ $error }}    
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{-- login form --}}
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-2" style="color:white; font-weight:bold;">Email Address</div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-2" style="color:white; font-weight:bold;">Password</div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info btn-block text-white">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row" style="margin-bottom:0px;">
                            <div class="col-md-12 text-center">
                                <a href="/register">
                                    Register
                                </a>
                            </div>
                            
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                                      
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
