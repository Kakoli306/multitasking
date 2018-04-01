@extends('frontEnd.layouts.master')

@section('features')
    <!-- Page Features -->

    <div class="row text-center">

        @foreach($posts->all() as $post)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title">{{$post->post_title}}</h4>

                        <p class="card-text">{{$post->amount}}</p>
                        <img class="card-img-top" src="{{ asset($post->post_image) }}" alt="Card image cap">
                    </div>
                    <div class="card-footer">

                     <?php $regsi=DB::table('purchases')->where('post_id',$post->id)->count(); ?>
                        {{$regsi}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection