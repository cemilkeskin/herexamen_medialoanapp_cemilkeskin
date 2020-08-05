@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit A Character</h1>
        <form method="post" action="{{ route('itemedit') }}">
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Naruto Uzumaki...">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Age</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="16...">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            @csrf
            <button type="submit" class="btn btn-secondary">Edit</button>
        </form>
    </div>
@endsection
