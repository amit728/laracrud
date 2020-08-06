@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard') }}
                    <a href="{{route('post.create')}}" class="float-right btn btn-success btn-sm">Add Post</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    @include('messages')
                    <table class="table mt-3">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Tag</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $count = 1 @endphp
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$count++}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->description}}</td>
                            <td>{{$post->category}}</td>
                            <td>{{$post->tag}}</td>
                            <td>
                                <a href="{{route('post.edit', $post->id)}}" class="btn btn-info btn-sm">Edit</a>&nbsp;
                                <a class="btn btn-sm btn-danger" href="" 
                                    onclick="
                                        if(confirm('Are you sure, You want to delete?')){
                                        event.preventDefault();
                                        document.getElementById('delete-{{$post->id}}').submit();
                                        }else{
                                        event.preventDefault();
                                        }">Delete
                                </a>
                                    <form id="delete-{{$post->id}}" action="{{ route('post.destroy', $post->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('delete')
                                    </form>
                            </td>
                        </tr>      
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Tag</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
