@extends('frontEnd.layouts.master')

@section('features')
    <!-- Page Features -->

    <!-- Page Content -->
    <div class="container">

        <div class="row">
        @foreach($posts->all() as $post)
            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">Title
                    <small>{{$post->post_title}}</small>
                </h1>
    <div class="card mb-4">
        <img class="card-img-top" src="{{ asset($post->post_image) }}" alt="Card image cap">
        <div class="card-body">
            <h2 class="card-title">Description</h2>
            <p class="card-text">{{$post->post_body}}</p>
            <a href="#" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
            <h1 class="my-4">Amount
                <small> {{$post->amount}}</small>
            </h1>

        </div>
    </div>

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="{{url("/purchase/{$post->id}")}}">Purchase</a>
                                    </li>

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    @endforeach


@endsection