@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Edit Post</h3>
                    @include('messages')
                    <form action="{{route('post.update', $post->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}" placeholder="Enter Title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="category" id="category" value="{{$post->category}}" placeholder="Enter Category">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tag" class="col-sm-2 col-form-label">Tag</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="tag" id="tag" value="{{$post->tag}}" placeholder="Enter Tag">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" id="description" name="description" rows="3" value="{{$post->description}}" placeholder="Enter Description">{{$post->description}}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{route('home')}}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
