@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <a href="{{ route('home') }}">
                <img class="arrow" src="{{url('/images/arrow.svg')}}" alt="">
            </a>

        @can('admin')
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Users') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                                <h3 class="card-title">All registered users up to date</h3>
                                <br>

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Role</td>
{{--                                    <td>Created At</td>--}}
{{--                                    <td>Updated At</td>--}}
                                    <td>Edit User</td>
                                    <td>Delete User</td>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)

                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role}}</td>
{{--                                        <td>{{$user->created_at}}</td>--}}
{{--                                        <td>{{$user->updated_at}}</td>--}}
                                        <td><a href="{{route('navigateEdit',$user->id)}}">
                                                <img class="iconUser" src="{{url('/images/edit.svg')}}" alt="">
                                            </a></td>
                                        <td><a onclick="return confirm('I hope you know what you are doing.')" href="{{route('deleteUser', $user->id )}}">
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
                                <a href="{{ route('navigateUser') }}" class="btn btn-primary">Create user</a>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
@endsection
