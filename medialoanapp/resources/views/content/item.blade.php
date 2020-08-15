@extends('layouts.app')

@section('content')

    <div class="container">
        @if(session()->has('message'))

            <div class="alert {{session('alert') ?? 'alert-info'}} fade show" role="alert ">
                <strong>Firm handshakes!</strong>  {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


        @endif
            <br>
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
            @can('uitleendienst')
            <div class="dropdown">
                <img class="card-img-small dropdown-toggle" id="dropdownMenuButton" src="{{url('/images/more.svg')}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" alt="Card image cap">

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('navigateEditItem', $item->id) }}">Edit item</a>
                    <a class="dropdown-item" onclick="return confirm('I hope you know what you are doing.')" href="{{ route('deleteItem', $item->id) }}">Delete item</a>

                </div>
            </div>
                @if($item->itemsleft == 1)
                    <div class="itemsleft" style="color: orange">{{$item->itemsleft}} item left</div>
                    @elseif($item->itemsleft == 0)
                    <div class="itemsleft" style="color: #DE003D">{{$item->itemsleft}} items left</div>
                @else
                    <div class="itemsleft">{{$item->itemsleft}} items left</div>
                    @endif

            @endcan
            <div class="card-body">
                <h5 class="card-title">{{$item->name}}</h5>
                <p class="card-text"> {{ \Illuminate\Support\Str::limit($item->description ,150,'...') }}</p>
                @if (\Illuminate\Support\Str::length($item->description) > 150)
                    @can('uitleendienst')

                     <a class="readmore" id="disabled" href="{{ route('items') }}">Read more</a>
                    @endcan

                        @can('user')


                            @if($item->itemsleft >=1)
                                <a class="readmore"  href="{{ route('navigateItem', $item->id) }}">Read more</a>

                            @else
                                <a class="readmore" id="disabled" href="{{ route('items') }}">Read more</a>
                            @endif
                        @endcan
                    <br>
                    <br>
                @endif

                @can('uitleendienst')
                    @if($item->itemsleft >=1)
                        <a href="{{ route('navigateItem', $item->id) }}" class="btn btn-primary disabled" >Loan item</a>

                    @else
                        <a href="{{ route('navigateItem', $item->id) }}" class="btn btn-primary disabled">Not available</a>
                    @endif
                @endcan

                @can('user')
                    @if($item->itemsleft >=1)
                <a href="{{ route('navigateItem', $item->id) }}" class="btn btn-primary" >Loan item</a>

                @else
                        <a href="{{ route('navigateItem', $item->id) }}" class="btn btn-primary disabled">Not available</a>
                    @endif
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
