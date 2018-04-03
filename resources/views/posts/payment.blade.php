@extends('frontEnd.layouts.master')



    <h2 class="text-center text-success">{{Session::get('message')}}</h2>


    <h3 class="panel-title">Please sign up for <small>Purchase</small></h3>


    <form class="form-horizontal" method="POST" action="{{ route('add-purchase')}}">
        {{ csrf_field() }}

        <input type="hiddden"  name=post_id value={{$id}}>




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



@endsection