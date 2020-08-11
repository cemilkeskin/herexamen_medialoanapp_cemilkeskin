@extends('layouts.app')

@section('content')

    <div class="container">
        @if(session()->has('message'))

            {{--                <div class="alert alert-danger {{session('alert') ?? 'alert-info'}}">--}}
            {{--                    {{ session('message') }}--}}
            {{--                </div>--}}

            <div class="alert {{session('alert') ?? 'alert-info'}} fade show" role="alert ">
                <strong>Firm handshakes!</strong>  {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <br>

            {{--            <div class="alert alert-danger">--}}
            {{--                <strong>Danger!</strong> Indicates a dangerous or potentially negative action.--}}
            {{--            </div>--}}
        @endif

        <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="">Search an item</span>
        </div>
        <input type="text" class="form-control">

    </div>


    @foreach($items as $item)

        <div class="card-small" style="width: 15rem;">
            <img class="card-img-top" src="{{url('/images/background.png')}}" alt="Card image cap">
            @can('uitleendienst')
            <div class="dropdown">
                <img class="card-img-small dropdown-toggle" id="dropdownMenuButton" src="{{url('/images/more.svg')}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" alt="Card image cap">

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('navigateEditItem', $item->id) }}">Edit item</a>
                    <a class="dropdown-item" onclick="return confirm('I hope you know what you are doing.')" href="{{ route('deleteItem', $item->id) }}">Delete item</a>

                </div>
            </div>
            @endcan
            <div class="card-body">
                <h5 class="card-title">{{$item->name}}</h5>
                <p class="card-text"> {{ \Illuminate\Support\Str::limit($item->description ,150,'...') }}</p>
                @if (\Illuminate\Support\Str::length($item->description) > 150)
                    @can('uitleendienst')
                     <a class="readmore" id="disabled" href="{{ route('items') }}">Read more</a>
                    @endcan

                        @can('user')
                            <a class="readmore"  href="{{ route('navigateItem', $item->id) }}">Read more</a>
                        @endcan
                    <br>
                    <br>
                @endif

                @can('uitleendienst')
                    <a href="#" class="btn btn-primary disabled" >Loan item</a>
                @endcan

                @can('user')
                <a href="{{ route('navigateItem', $item->id) }}" class="btn btn-primary" >Loan item</a>
                @endcan
            </div>
        </div>


    @endforeach
        <br>
        <br>
        <br>
        @can('uitleendienst')
    <a href="{{ route('navigateCreate') }}" class="btn btn-success">Create item</a>
        @endcan
    </div>



@endsection
