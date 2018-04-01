@extends('layouts.app')


@section('content')
    <br/>
    <!-- /.row -->
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

                                <td class="center">


                                    <form action="{{ route('edit-post') }}" method="POST" style="display: inline;">
                                        {{ csrf_field() }}

                                        <input type="hidden" value="{{ $post->id }}" name="post_id">
                                        <button type="submit" class="btn btn-success btn-sm" title="Edit">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </button>
                                    </form>

                                    <form action="{{ route('delete-post') }}" method="POST" style="display: inline;">
                                        {{ csrf_field() }}

                                        <input type="hidden" value="{{$post->id }}" name="post_id">
                                        <button type="submit" name="btn" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure To Delete This !')">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </form>

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

    <!-- /.row -->

@endsection
