@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">USER Dashboard</div>

                  <div class="panel-body">
                    @component('components.who')
                    @endcomponent
                  </div>
                </div>
            </div>

        <div class="card">
            @foreach($posts->all() as $post)
                <h4>{{$post->post_title}}</h4>
                <img class="card-img-top" src = "{{$post->post_image}}" alt="">
                <div class="card-body">
                    <p class="card-text">{{$post->post_body}}</p>

                @endforeach
        </div>
        </div>
    </div>

</div>
@endsection
