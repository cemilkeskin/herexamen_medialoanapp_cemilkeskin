@extends('layouts.app')

@section('content')
@can('uitleendienst')
    <div class="container">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="">Search an item</span>
        </div>
        <input type="text" class="form-control">

    </div>
    <br>
    @foreach($items as $item)

        <div class="card-small" style="width: 15rem;">
            <img class="card-img-top" src="{{url('/images/background.png')}}" alt="Card image cap">
            <div class="dropdown">
                <img class="card-img-small dropdown-toggle" id="dropdownMenuButton" src="{{url('/images/more.svg')}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" alt="Card image cap">

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('navigateEditItem', $item->id) }}">Edit item</a>
                    <a class="dropdown-item" onclick="return confirm('I hope you know what you are doing.')" href="{{ route('deleteItem', $item->id) }}">Delete item</a>

                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$item->name}}</h5>
                <p class="card-text">{{$item->description}}</p>
                <a href="#" class="btn btn-primary disabled" >Loan item</a>
            </div>
        </div>


    @endforeach
        <br>
        <br>
        <br>
    <a href="{{ route('navigateCreate') }}" class="btn btn-success">Create item</a>
    </div>
@endcan
@endsection
