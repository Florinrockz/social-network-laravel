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
                <form action="" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="body" id=""  rows="5" class="form-control" placeholder="Enter your post!"></textarea>
                        @if($errors->has('body'))
                            <small class="text-danger">{{ $errors->first('body') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <select name="category" id="" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" value="Post" class="btn btn-primary btn-block">
                </form>
                    <br>
                @foreach($posts as $post)
                    <div class="card">
                        <div class="card-body">

                            <p class="card-text">{{ $post->body }}</p>
                            Category: <h5 class="badge badge-secondary">{{ $post->category->name }}</h5>
                            <br>
                            <h6 class="card-subtitle mb-2 text-muted"> Created by {{ $post->user->name }} on {{ $post->created_at }}</h6>
                            {{--<br>--}}
                            <a href="#" class="card-link" @click="likePost({{ $post->id }})">Like</a>
                            <a href="#" class="card-link">Comment</a>
                            <a href="{{ route('post.edit',[$post->id]) }}" class="card-link">Edit</a>
                            <a href="{{ route('post.delete',[$post->id]) }}" class="card-link">Delete</a>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        function likePost(id) {
            axios.post('{{ route('like') }}',)
        }
    </script>
@endsection