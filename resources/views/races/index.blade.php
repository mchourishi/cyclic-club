@extends('layouts.common.master')

@section('inline-css')
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
@endsection

@section('content_header','Manage Races')

@section('breadcrumbs')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('races.index') }}">Manage Races</a></li>
    <li class="breadcrumb-item active">List Race</li>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Races</h3>
                            <div class="coll-md-2 float-right">
                                <a type="button" href="{{route('races.create')}}"
                                   class="btn btn-primary btn-sm pull-right">New Race</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="races-list" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Club</th>
                                    <th>Address</th>
                                    <th>Date & Time</th>
                                    <th>Status</th>
                                    <th>Riders</th>
                                    <th>Results</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($races as $race)
                                    <tr>
                                        <td><a href="{{route('races.show', [$race->id])}}">{{ $race->title }}</a></td>
                                        <td>{{ $race->club->title }}</td>
                                        <td>{{ $race->address }}</td>
                                        <td>{{ $race->date_time }}</td>
                                        <td>{{ $race->status }}</td>
                                        <td>
                                            @foreach($race->riders as $rider)
                                               <span class="badge bg-primary">{{ $rider->firstName." ". $rider->lastName }}</span>
                                            @endforeach
                                        </td>
                                        <td><a href="{{route('results.create', [$race->id])}}" title="Race Results">
                                                <button class="btn btn-primary btn-sm"><em class="fa fa-pencil"></em></button>
                                            </a></td>
                                        <th></th>
                                    </tr>
                                @empty
                                    @include('layouts.scripts.noRecordsFound',['colspan' => 7])
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Club</th>
                                    <th>Address</th>
                                    <th>Date & Time</th>
                                    <th>Status</th>
                                    <th>Riders</th>
                                    <th>Results</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('inline-js')
    @parent
    @include('layouts.common.datatableJs')
@endsection
