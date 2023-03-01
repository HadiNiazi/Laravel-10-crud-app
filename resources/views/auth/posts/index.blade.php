@extends('layouts.app')

@section('title', 'Posts')

@section('styles')
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a class="btn btn-info mb-3" href="{{ route('posts.create') }}">New Post</a>

            @if (Session::has('alert-success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session::get('alert-success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">Posts</div>


                <div class="container">
                    @if (count($posts)> 0)
                    <table class="table">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Created At</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($posts as $post)
                            <tr>
                              <td>{{ $post->title }}</td>
                              <td>{{ $post->body }}</td>
                              <td>{{ $post->created_at->diffForHumans() }}</td>
                              <td>
                                <a href="{{ route('posts.show', $post->id) }}"> <i class="fas fa-eye" style="display:inline-block"></i> </a>
                                <a href="{{ route('posts.edit', $post->id) }}"><i class="fas fa-edit" style="display:inline-block"></i></a>
                                <form method="post" action="{{ route('posts.destroy', $post->id) }}" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                    <button style="border: none; background: none;"><i class="fas fa-trash"></i></button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                    @else
                    <h3 class="text-center text-danger mb-2 mt-2">No post found</h3>

                    @endif
                </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
