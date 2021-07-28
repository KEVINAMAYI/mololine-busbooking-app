@extends('layouts.app',['backgroundcolor' => 'rgb(255,255,255)'])

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="border-bottom:solid 1px white; background-color:rgb(40,50,60); color:white;">{{ __('Register') }}</div>

                <div class="card-body" style="background-color:rgb(40,50,60);">

                    {{-- display error on top of the form --}}
                    @if ($errors->any())
                    <div class="alert alert-info pl-2 pr-2 pt-2 pb-2 mt-3 ml-3 mr-3 mb-3">
                        <ul class="list-group">
                            @foreach ($errors->all() as $error )
                            <li class="list-group-item text-red">
                              {{ $error }}  
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{-- register user form --}}
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-2" style="color:white;">Name</div>
                        <div class="form-group row">
                             <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-2" style="color:white;">Email</div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-2" style="color:white;">Phone Number</div>
                        <div class="form-group row">
                            <div class="col-md-12 ">
                                <input id="phonenumber" type="number" class="form-control" name="phonenumber" placeholder="Phone Number">
                            </div>
                        </div>
                       
                        <div class="mb-2" style="color:white;">Avatar</div>
                        <div class="form-group row">
                            <div class="col-md-12 ">
                                <input id="avatar" type="file" class="form-control" name="image" style="padding-top: 15px;">
                            </div>
                        </div>
                        <div class="mb-2" style="color:white;">Password</div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-2" style="color:white;">Confirm Password</div>
                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
