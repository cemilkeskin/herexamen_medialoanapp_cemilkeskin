@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <a href="{{ route('items') }}">
                <img class="arrow" src="{{url('/images/arrow.svg')}}" alt="">
            </a>

            @can('uitleendienst')
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('User loans') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <h3 class="card-title">All user loans up to date</h3>
                            <br>

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Item</td>
                                    <td>Email</td>
                                    <td>Loan Start Date</td>
                                    <td>Loan End Date</td>
                                    <td>Comments</td>
                                    <td>Edit Loan</td>
                                    <td>Delete Loan</td>

                                    {{--                                    <td>Created At</td>--}}
                                    {{--                                    <td>Updated At</td>--}}


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
                                        <td>{{$loan->comments}}</td>
                                        <td><a href="{{route('navigateEditLoan',$loan->id)}}">
                                                <img class="iconUser" src="{{url('/images/edit.svg')}}" alt="">
                                            </a></td>
                                        <td><a onclick="return confirm('I hope you know what you are doing.')" href="{{route('deleteLoan', $loan->id )}}">
                                                <img class="iconUser" src="{{url('/images/cancel.svg')}}" alt="">
                                            </a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="{{ route('items') }}" class="btn btn-success">Make a new loan</a>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
@endsection
