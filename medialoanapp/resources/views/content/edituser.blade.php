@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <a href="{{ route('users') }}">
                <img class="arrow" src="{{url('/images/arrow.svg')}}" alt="">
            </a>


            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit user') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('editUser', $users->id) }}">
                            @csrf

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h3 class="card-title">Edit the user {{ $users->name }}</h3>
                            <br>

                            <div class="form-group">
                                <label for="name" >{{ __('Name') }}</label>

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus placeholder="Enter name" value="{{ $users->name }}">


                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group ">
                                <label for="email" >{{ __('E-Mail Address') }}</label>


                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" placeholder="Enter email" value="{{ $users->email }}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="role" >{{ __('Role') }}</label>

{{--                                <input id="role" type="text" class="form-control @error('name') is-invalid @enderror" name="role"  required autocomplete="role" autofocus placeholder="Enter role" value="{{ $users->role }}">--}}

                                <select id="role" name="role" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" value="{{ $users->role }}">

                                    <option value="user">user</option>
                                    <option value="uitleendienst">uitleendienst</option>
                                    <option value="admin">admin</option>
                                </select>


                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Edit user') }}
                            </button>

                        </form>

                    </div>
                </div>
            </div>
            <div class="card" id="card-right">
                <div class="card-header">{{ __('User log') }}</div>

                <div class="card-body">

                    <div class="form-group ">
                        <label for="password" >{{ __('User created at') }}</label>
                        <h6 style="font-weight: bold" class="card-title">{{ $users->created_at }}</h6>

                    </div>

                    <div class="form-group ">
                        <label for="password" >{{ __('User updated at') }}</label>
                        <h6 style="font-weight: bold" class="card-title">{{ $users->updated_at }}</h6>

                    </div>

                </div>
            </div>
        </div>

    </div>


@endsection











