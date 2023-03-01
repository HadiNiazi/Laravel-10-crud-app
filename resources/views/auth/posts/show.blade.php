@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a class="btn btn-info mb-2" href="{{ route('posts.index') }}">Go Back</a>

            <div class="card">
                <div class="card-header">Show Post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if ($post)
                    <table class="table">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <td>{{ $post->title }}</td>
                          </tr>

                          <tr>
                            <th>Body</th>
                            <td>{{ $post->body }}</td>
                          </tr>

                          <tr>
                            <th>Created At</th>
                            <td>{{ $post->created_at->diffForHumans() }}</td>
                          </tr>

                        </thead>
                    </table>
                    @else
                        <h3 class="text-center text-danger text-bold">No post found</h3>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
