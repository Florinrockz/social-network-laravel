@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
            <div class="col-sm-6">
                <div class="well">
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="category-name">Category</label>
                            <input type="text" id="category-name" name="name" class="form-control">
                            @if($errors->has('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        <input type="submit" class="btn btn-primary btn-block" value="Create Category">
                    </form>
                </div>
            </div>
        <div class="col-sm-6">
            @foreach( $categories as $category )
                <div class="card">
                    <div class="card-body">
                       {{ $category->name }}
                    </div>
                    <h6 class="card-subtitle mb-2 ml-3 mt-2 text-muted">Created by {{ $category->user->name }}</h6>
                </div>
                <br>
            @endforeach
        </div>
    </div>
@endsection