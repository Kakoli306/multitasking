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

        </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    <a href="{{ route('admin.permission') }}"title="publishedPurchase" class="btn btn-warning btn-sm">
                      purchased
                    </a>

                    <a href="{{ route('accounts-admin') }}" class="btn btn-warning btn-sm">
                       Accounts
                    </a>

                    <a href="{{ route('new-register') }}" class="btn btn-primary">
                        Register
                    </a>
                </div>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DataTables Advanced Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <h3>{{ Session::get('message') }}</h3>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Sl NO</th>
                            <th>Post Title</th>
                            <th>Post body</th>
                            <th>Post Image</th>
                            <th>Amount</th>
                            <th> Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($posts->all() as $post)

                            <tr class="odd gradeX">
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->post_title }}</td>
                                <td>{{ $post->post_body }}</td>
                                <td>{{ $post->post_image }}</td>
                                <td>{{ $post->amount }}</td>
                                <td>{{$post->status }}</td>
                                <td>
                                    @if($post->status == 0) Pending
                                    @elseif($post->status == 1) Accepted
                                    @elseif($post->status == 2) Rejected
                                    @else Undefined
                                    @endif

                                </td>
                                <td class="center">
                                       <!-- <a href="{{ '/Multiple/post/pending/'.$post->id }}" title="Pending" class="btn btn-primary btn-sm">
                                            pending
                                        </a>
                                        <a href="{{ '/Multiple/post/accept/'.$post->id }}"title="Accept" class="btn btn-warning btn-sm">
                                            accept
                                        </a>

                                        <a href="{{ '/Multiple/post/reject/'.$post->id }}" title="Reject" class="btn btn-success btn-sm">
                                            Rejected
                                        </a> -->

                                           <a href="{{ route('pending-post', ['id'=>$post->id]) }}" title="Pending" class="btn btn-primary btn-sm">
                                               Pending
                                           </a>
                                           <a href="{{ route('accept-post', ['id'=>$post->id]) }}"title="Accept" class="btn btn-warning btn-sm">
                                               Accept
                                           </a>
                                           <a href="{{ route('reject-post', ['id'=>$post->id]) }}"title="Reject" class="btn btn-warning btn-sm">
                                               Reject
                                           </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
