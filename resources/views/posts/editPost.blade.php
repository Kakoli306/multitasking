@extends('layouts.app')

@section('content')

    <h2 class="text-center text-success">{{Session::get('message')}}</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel default">
                    <div class="panel-heading"> Edit Post</div>

                    <div class="panel-body">
                        <div class="row">
                            <form class="form-horizontal" method="POST" action="{{ route('update-post')}}" enctype="multipart/form-data">

                                {{ csrf_field() }}

<input hiddden name=post_id value={{$postById->id}}>

                                <div class="form-group{{ $errors->has('post_title') ? ' has-error' : '' }}">
                                    <label for="post_title" class="col-md-4 control-label">Post Title</label>

                                    <div class="col-md-6">
                                        <input id="post_title" type="text" class="form-control" name="post_title" value="{{$postById->post_title}}">

                                        @if ($errors->has('post_title'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('post_title') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('post_body') ? ' has-error' : '' }}">
                                    <label for="post_body" class="col-md-4 control-label">Post body</label>

                                    <div class="col-md-6">
                                 <input id="post_body" rows="7" type="text" class="form-control" name="post_body" value="{{$postById->post_body}}">

                                        @if ($errors->has('post_body'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('post_body') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('post_image') ? ' has-error' : '' }}">
                                    <label for="post_image" class="col-md-4 control-label">Post Image</label>

                                    <div class="col-md-6">
                                        <input type="file" name="post_image"  value="{{$postById->post_image}}" accept="image/*">
                                        <span class="text-danger">{{$errors->has('post_image')? $errors->first('post_image'):''}}</span>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('post_file') ? ' has-error' : '' }}">
                                    <label for="post_file" class="col-md-4 control-label">Post File</label>

                                    <div class="col-md-6">
                                        <input type="file" name="post_file"  value="{{$postById->post_file}}" accept="file/*">
                                        <span class="text-danger">{{$errors->has('post_file')? $errors->first('post_file'):''}}</span>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                    <label for="amount" class="col-md-4 control-label">Amount</label>

                                    <div class="col-md-6">
                                        <input id="amount" type="number" min="1" class="form-control" name="amount" value="{{$postById->amount}}"
                                        >

                                        @if ($errors->has('amount'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update post
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection