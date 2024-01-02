@if (session('status'))
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="material-icons">close</i>
            </button>
            <span>{{ session('status') }}</span>
        </div>
    </div>
</div>
@endif
@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="material-icons">close</i>
            </button>
            <span>{{ $error }}</span>
        </div>
    </div>
</div>
@endforeach
@endif
