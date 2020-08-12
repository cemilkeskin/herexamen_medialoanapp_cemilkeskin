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


        <div class="row justify-content-center">
            <a href="{{ route('items') }}">
                <img class="arrow" src="{{url('/images/arrow.svg')}}" alt="">
            </a>

            @can('uitleendienst')


                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Loans') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <h3 class="card-title">All registered loans up to date</h3>
                            <br>

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Item</td>
                                    <td>User Email</td>
                                    <td>Loan Start Date</td>
                                    <td>Loan End Date</td>
                                    <td>Edit Loan</td>
                                    <td>Delete Loan</td>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($loans as $loan)

                                    <tr>
                                        <td>{{$loan->id}}</td>
                                        <td>{{$loan->name}}</td>
                                        <td>{{$loan->email}}</td>
                                        <td>{{$loan->dateStart}}</td>
                                        <td>{{$loan->dateEnd}}</td>
                                        {{--                                        <td>{{$user->created_at}}</td>--}}
                                        {{--                                        <td>{{$user->updated_at}}</td>--}}
                                        <td><a href="{{route('navigateEdit',$loan->id)}}">
                                                <img class="iconUser" src="{{url('/images/edit.svg')}}" alt="">
                                            </a></td>
                                        <td><a onclick="return confirm('I hope you know what you are doing.')" href="{{route('deleteLoan', $loan->id )}}">
                                                <img class="iconUser" src="{{url('/images/cancel.svg')}}" alt="">
                                            </a></td>

                                        {{--                                    <td>--}}
                                        {{--                                        <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-primary">Edit</a>--}}
                                        {{--                                    </td>--}}

                                        {{--                                    <td>--}}
                                        {{--                                        <form action="{{ route('contacts.destroy', $contact->id)}}" method="post">--}}
                                        {{--                                            @csrf--}}
                                        {{--                                            @method('DELETE')--}}
                                        {{--                                            <button class="btn btn-danger" type="submit">Delete</button>--}}
                                        {{--                                        </form>--}}
                                        {{--                                    </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
@endsection
