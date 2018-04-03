@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Register Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <h3>{{ Session::get('message') }}</h3>

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Sl NO</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users->all() as $user)

                            <tr class="odd gradeX">
                                <td>{{$user->id }}</td>
                                <td>{{$user->name }}</td>
                                <td>{{$user->email }}</td>
                                <td>{{$user->register_status }}</td>
                                <td>
                                    <td class="center">
                                    <a href="{{ route('welcome-register', ['id'=>$user->id]) }}"  class="btn btn-primary btn-sm">
                                       Welcome
                                    </a>
                                    <a href="{{ route('dismiss-register', ['id'=>$user->id]) }}" class="btn btn-warning btn-sm">
                                       Dismiss
                                    </a>
                                </td>
                                </td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                    </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
            </div>
        </div>
    </div>

@endsection