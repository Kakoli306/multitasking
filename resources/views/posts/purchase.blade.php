@extends('frontEnd.layouts.master')

@section('content')
    Purchase
@endsection

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

                </div>
        </div>
    </div>
    @endforeach

    <h2 class="text-center text-success">{{Session::get('message')}}</h2>


    <h3 class="panel-title">Please sign up for <small>Purchase</small></h3>


    <form class="form-horizontal" method="POST" action='{{url("purchase/add/{$post->id}")}}'>
                   {{ csrf_field() }}


        <input type="hidden" name="post_id" value="{{ $id }}">

        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
        <label for="first_name" class="col-md-4 control-label">First name</label>

            <div class="col-md-6">
                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">

            @if ($errors->has('first_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
        <label for="last_name" class="col-md-4 control-label">Last name</label>

        <div class="col-md-6">
            <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
            @if ($errors->has('last_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">Email</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
        <label for="number" class="col-md-4 control-label">Phone Number</label>

        <div class="col-md-6">
            <input id="number" type="number" class="form-control" name="number" value="{{ old('number') }}">
            @if ($errors->has('number'))
                <span class="help-block">
                    <strong>{{ $errors->first('number') }}</strong>
                </span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <label for="address" class="col-md-4 control-label">Address</label>
        <div class="col-md-6">
            <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">
            @if ($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
    </div>

        <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
               Register
            </button>
        </div>
    </div>

        <div class="container">
            <ul>




            </ul>
        </div>
    </form>
    </div>
    <div>
    </div>

@endsection