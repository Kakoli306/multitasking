@extends('frontEnd.layouts.master')

@section('title')
    New
    @endsection

@section('message')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    @component('components.who')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron my-4">
            <h1 class="display-3">A Warm Welcome!</h1>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>

            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Registration</a>
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>


        </header>

        <div class="row text-center">
            <div class="col-lg-3 col-md-3 mb-2">

            </div>
        </div>
    </div>

    @endsection

@section('features')
    <!-- Page Features -->

    <div class="row text-center">

        @foreach($posts->all() as $post)
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="{{$post->post_image}}" alt="" width="200" height="200">
                <div class="card-body">
                    <h4 class="card-title">{{$post->post_title}}</h4>
                    <p class="card-text">{{ substr($post->post_body,0,100)}}</p>
                    <p class="card-text">{{$post->amount}}</p>
                </div>
                <div class="card-footer">
                    <a href="{{url("/view/{$post->id}")}}" class="btn btn-primary">Find Out More!</a>
                </div>

                <div class="card-footer">
                    <li><a href="{{ route('contact.purchase', ['id'=>$post->id]) }}">Purchase</a> </li>
                </div>

                <div class="card-footer">

                </div>

            </div>
        </div>
        @endforeach


    </div>


    @endsection