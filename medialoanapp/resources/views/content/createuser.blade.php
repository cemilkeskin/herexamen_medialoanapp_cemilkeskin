@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create user') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('createUser') }}">
                            @csrf


                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <h3 class="card-title">Create an user by filling up the form</h3>

                            <div class="form-group">
                                <label for="name" >{{ __('Name') }}</label>

                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter name">


                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                            </div>

                            <div class="form-group ">
                                <label for="email" >{{ __('E-Mail Address') }}</label>


                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                            </div>

                            <div class="form-group ">
                                <label for="password" >{{ __('Password') }}</label>


                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                            </div>




                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create user') }}
                                    </button>

                        </form>

                    </div>
            </div>
        </div>
    </div>









{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            @can('admin')--}}
{{--                <div class="col-md-8">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">{{ __('Create user') }}</div>--}}

{{--                        <div class="card-body">--}}


{{--                            @if (session('status'))--}}
{{--                                <div class="alert alert-success" role="alert">--}}
{{--                                    {{ session('status') }}--}}
{{--                                </div>--}}
{{--                            @endif--}}

{{--                            <h3 class="card-title">Create an user by filling up the form</h3>--}}

{{--                                <form method="POST" action="{{ route('register') }}">--}}
{{--                                    @csrf--}}

{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">Name</label>--}}
{{--                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">--}}

{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputEmail1">Email address</label>--}}
{{--                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">--}}

{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputPassword1">Password</label>--}}
{{--                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <label for="exampleInputPassword1">Confirm password</label>--}}
{{--                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm password">--}}
{{--                                </div>--}}

{{--                                <a href="{{ route('createuser') }}" class="btn btn-primary">Create user</a>--}}
{{--                            </form>--}}


{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}





{{--            @endcan--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection











