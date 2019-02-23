@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="Close">&times;</a>
                        {{ Session::get('success') }}
                    </div>
                @endif
                <form action="{{ route('post.update',['id' => $post->id]) }}" method="post">
                    {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" id="post-body"  rows="5" class="form-control" >{{ $post->body }}</textarea>
                    {{--<script>
                        let body = "{{ $post->body }}";
                        $('#post-body').val(body);
                    </script>--}}
                    @if($errors->has('body'))
                        <small class="text-danger">{{ $errors->first('body') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <select name="category" id="" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $post->category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="Post" class="btn btn-primary btn-block">
                </form>
            </div>
        </div>
    </div>
@endsection