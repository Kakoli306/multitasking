@extends('frontEnd.layouts.master')

@section('features')

    <h2 class="text-center text-success">{{Session::get('message')}}</h2>


    <h3 class="panel-title">Please sign up for <small>Purchase</small></h3>


    <form class="form-horizontal" method="POST" action="{{ route('guide')}}">
        {{ csrf_field() }}

        <input hiddden name=post_id value={{$id}}>

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


    </form>



@endsection