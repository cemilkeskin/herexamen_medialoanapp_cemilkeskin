@extends('layouts.app')

@section('content')
    @can('user')

        <a href="{{ route('items') }}">
            <img class="arrow2" src="{{url('/images/arrow.svg')}}" alt="">
        </a>

        <div class="container">
            <br>

            @if(session()->has('message'))
                {{--                <div class="alert alert-danger {{session('alert') ?? 'alert-info'}}">--}}
                {{--                    {{ session('message') }}--}}
                {{--                </div>--}}

                <div class="alert alert-danger alert-dismissible fade show" role="alert {{session('alert') ?? 'alert-info'}}">
                    <strong>Holy guacamole!</strong>  {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <br>

                {{--            <div class="alert alert-danger">--}}
                {{--                <strong>Danger!</strong> Indicates a dangerous or potentially negative action.--}}
                {{--            </div>--}}
            @endif

            @foreach($loans as $loan)
            <figure class="figure">
                <img src="{{url('/images/background.png')}}" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                <figcaption class="figure-caption">{{$loan->name}}</figcaption>
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

                <h1 style="font-weight: bold">{{$loan->name}}</h1>
                <br>
                <h5 style="font-weight: bold">Loaning on</h5>
                <h6 style="margin-top: 10px">{{$loan->email}}</h6>
                <br>
                <div>
                    <div style="float: left">
                        <h5 style="font-weight: bold">Loan start date</h5>
                        <h6 style="margin-top: 10px">{{$loan->dateStart}}</h6>
                    </div>

                    <div style="float: right; margin-right: 100px">
                        <h5 style="font-weight: bold">Loan end date</h5>
                        <h6 style="margin-top: 10px">{{$loan->dateEnd}}</h6>
                    </div>

                </div>
                <br>
                <br>
                <br>
                <br>
                <h5 style="font-weight: bold">Comments</h5>
                <p>{{$loan->comments}}</p>
                <br>
                <a href="https://www.sony.co.uk/electronics/support/res/manuals/4581/45815344M.pdf" target="_blank">Instruction manual</a>
                <img style="width: 5%; margin-left: 7px" src="{{url('/images/pdf.svg')}}" alt="">

        </div>

        @endforeach

    @endcan
@endsection
