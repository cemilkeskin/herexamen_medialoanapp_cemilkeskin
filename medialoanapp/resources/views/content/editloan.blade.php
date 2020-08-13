@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <a href="{{ route('items') }}">
                <img class="arrow" src="{{url('/images/arrow.svg')}}" alt="">
            </a>


            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit loan') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('editLoan', $loans->id) }}">
                            @csrf


                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h3 class="card-title">Edit the loan #{{$loans->id}} by filling up the form</h3>
                            <br>

                            <div class="form-group">
                                <label for="name" >{{ __('Item Name') }}</label>

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $loans->name }}" required autocomplete="name" autofocus placeholder="Enter item name" readonly>


                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="description" >{{ __('Item Loaned On') }}</label>

                                <input id="description" type="text" class="form-control @error('name') is-invalid @enderror" name="description" value="{{ $loans->dateStart }}" rows="3" required autocomplete="description" autofocus placeholder="Enter item description" readonly>


                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="inputEmail4">Extend Loan By</label>
                                <input  id="extendLoan" type="number" class="form-control @error('password') is-invalid @enderror" name="extendLoan" required autocomplete="new-password" placeholder="Enter the amount of weeks to extend." min="1">
                                <small id="emailHelp" class="form-text text-muted">The amount of number you put in represents the amount of weeks on top of the start loan.</small>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>


                            <br>

                            <button type="submit" class="btn btn-primary">
                                {{ __('Edit loan') }}
                            </button>
                            <br>
                            <br>

                        </form>

                    </div>
                </div>
            </div>
        </div>


@endsection











