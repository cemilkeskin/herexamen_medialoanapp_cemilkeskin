@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <a href="{{ route('items') }}">
                <img class="arrow" src="{{url('/images/arrow.svg')}}" alt="">
            </a>


            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create item') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('editItem', $items->id) }}">
                            @csrf


                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h3 class="card-title">Create an item by filling up the form</h3>
                            <br>

                            <div class="form-group">
                                <label for="name" >{{ __('Name') }}</label>

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $items->name }}" required autocomplete="name" autofocus placeholder="Enter item name">


                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="packageitems" >{{ __('Package Items') }}</label>

                                <input id="packageitems" type="text" class="form-control @error('name') is-invalid @enderror" name="packageitems" value="{{ $items->packageitems }}" required autocomplete="packageitems" autofocus placeholder="Enter containing items in the package">


                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="instructions" >{{ __('Item instructions') }}</label>

                                <input id="instructions" type="text" class="form-control @error('name') is-invalid @enderror" name="instructions" value="{{ $items->instructions }}" required autocomplete="instructions" autofocus placeholder="Enter instruction link">


                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="description" >{{ __('Item description') }}</label>

                                <input id="description" type="text" class="form-control @error('name') is-invalid @enderror" name="description" value="{{ $items->description }}" rows="3" required autocomplete="description" autofocus placeholder="Enter item description">


                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="additionalinfo" >{{ __('Additional info') }}</label>

                                <input id="additionalinfo" type="text" class="form-control @error('name') is-invalid @enderror" name="additionalinfo" value="{{ $items->additionalinfo }}" rows="3" required autocomplete="additionalinfo" autofocus placeholder="Enter additional info about the item (damages to the item)">


                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="itemsleft" >{{ __('Items available') }}</label>

                                <input id="itemsleft" type="number" class="form-control @error('name') is-invalid @enderror" name="itemsleft" value="{{ $items->itemsleft }}" required autocomplete="itemsleft" autofocus placeholder="Enter the amount of items available" min="0">


                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload an image</span>
                                </div>
                                <div class="custom-file">
                                    <input name="picture" class="form-control @error('name') is-invalid @enderror"  value="{{ $items->picture }}"  type="file" class="custom-file-input" id="inputGroupFile01" required>
                                    <label name="picture" class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <br>

                            <button type="submit" class="btn btn-primary">
                                {{ __('Create item') }}
                            </button>
                            <br>
                            <br>

                        </form>

                    </div>
                </div>
            </div>
        </div>


@endsection











