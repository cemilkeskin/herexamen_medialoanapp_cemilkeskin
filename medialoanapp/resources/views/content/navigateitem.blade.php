@extends('layouts.app')

@section('content')
    @can('user')
        <a href="{{ route('items') }}">
            <img class="arrow2" src="{{url('/images/arrow.svg')}}" alt="">
        </a>

        <div class="container">
            <br>

        <figure class="figure">
            <img src="{{url('/images/background.png')}}" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
            <figcaption class="figure-caption">{{$items->name}}</figcaption>
        </figure>

{{--            <div class="card" style="float: right; width: 38%; margin-left: 20px" >--}}

{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">{{$items->name}}</h5>--}}
{{--                    <p class="card-text2">{{$items->description}}</p>--}}

{{--                    <br>--}}
{{--                    <a href="#" class="btn btn-primary">Loan item</a> --}}

{{--                </div>--}}
{{--            </div>--}}

            <div class="containerRight">


            <h1 style="font-weight: bold">{{$items->name}}</h1>
            <br>
            <p>{{$items->description}}</p>
            <br>
                <a href="https://www.sony.co.uk/electronics/support/res/manuals/4581/45815344M.pdf" target="_blank">Instruction manual</a>
                <img style="width: 5%; margin-left: 7px" src="{{url('/images/pdf.svg')}}" alt="">

                <!-- Button trigger modal -->
                <br>
                <br>
                <br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Loan item
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$items->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{ route('createLoan', [$items->id, Auth::user()->id]) }}">
                            <div class="modal-body">

                                    @csrf


                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <div class="form-group ">
                                        <label for="email" >{{ __('User E-Mail Address') }}</label>

                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email" placeholder="Enter email" readonly>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label for="name" >{{ __('Item Name') }}</label>

                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $items->name }}" required autocomplete="name" autofocus placeholder="Enter name" readonly>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                            <label for="inputEmail4">Loan Start Date</label>
                                            <input  id="dateStart" type="date" class="form-control @error('password') is-invalid @enderror" name="dateStart" required autocomplete="new-password" placeholder="Enter Date Start" min="<?php echo date('Y-m-d'); ?>">
                                            <small id="emailHelp" class="form-text text-muted">The end date will be automatically calculated, to extend the loan period please contact us.</small>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label for="comments" >{{ __('Comments') }}</label>

                                        <input id="comments" type="text" class="form-control @error('name') is-invalid @enderror" name="comments" value="" required autocomplete="comments" autofocus placeholder="Please enter potential remarks for the staff.">
                                        <small id="emailHelp" class="form-text text-muted">If there is none, simply type "none".</small>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Go back</button>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Loan item') }}
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endcan
@endsection
