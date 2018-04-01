@extends('layouts.app')

@section('content')


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
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>permission Status</th>
                            <th>post Id</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($purchases->all() as $purchase)

                            <tr class="odd gradeX">
                                <td>{{$purchase->id }}</td>
                                <td>{{$purchase->first_name }}</td>
                                <td>{{$purchase->last_name }}</td>
                                <td>{{$purchase->email }}</td>
                                <td>{{$purchase->number }}</td>
                                <td>{{$purchase->address }}</td>
                                <td>{{$purchase->permission_status }}</td>
                                <td>{{$purchase->post_id }}</td>
                                <td>

                                    @if ($purchase->permission_status == 0) Unpublished
                                    @elseif ($purchase->permission_status == 1) published
                                    @endif

                                </td>
                                <td class="center">
                                    <a href="{{ route('contact.unpublished', ['id'=>$purchase->id]) }}" title="unpublishedPurchase" class="btn btn-primary btn-sm">
                                      Refused
                                    </a>
                                    <a href="{{ route('contact.published', ['id'=>$purchase->id]) }}"title="publishedPurchase" class="btn btn-warning btn-sm">
                                       Purchased
                                    </a>
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