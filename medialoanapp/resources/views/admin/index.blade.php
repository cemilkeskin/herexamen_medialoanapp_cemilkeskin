@extends('layouts.admin')

@section('content')
    <div class="container">
        @if(session('forminput'))
        <div class="alert alert-success" role="alert">
            Character <b>{{ session('forminput') }}</b> Created Successfully
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <h1>
            Characters
        </h1>
        <div>

            <h2>Naruto Uzumaki</h2>
            <p>Naruto Uzumaki is a great Rasengan user</p>
            <a class="btn btn-primary" href="{{ route('content.item', ['id' => 1])}}">Link details</a>

            <hr>

            <h2>Sasuke Uchiha</h2>
            <p>Sasuke Uzumaki is a great Sharingan user</p>
            <a class="btn btn-primary" href="{{ route('content.item', ['id' => 2])}}">Link details</a>

            <hr>

            <h2>Killua Zoldyck</h2>
            <p>Killua is a great Electricity user</p>
            <a class="btn btn-primary" href="{{ route('content.item', ['id' => 3])}}">Link details</a>

            <hr>
<h1>Create Or Edit A New Character</h1>
            <a class="btn btn-primary" href="{{ route('admin.create')}}">Create</a>
            <a class="btn btn-secondary" href="{{ route('admin.edit')}}">Edit</a>
        </div>
    </div>
@endsection
