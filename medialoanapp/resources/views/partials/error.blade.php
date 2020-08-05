@foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
        <b>{{ $error }}</b> Please write again
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endforeach
