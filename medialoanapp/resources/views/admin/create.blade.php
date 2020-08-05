@extends('layouts.admin')

@section('content')

    <div class="container">

    @include('partials.error')
        <h1>Create A New Character</h1>
    <form method="post" action="{{ route('itemcreate') }}">
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Naruto Uzumaki..." name="title">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Age</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="16..." name="age">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
        </div>
        @csrf
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    </div>
@endsection
