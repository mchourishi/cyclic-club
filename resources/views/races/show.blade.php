@extends('layouts.common.master')

@section('content_header','Manage Races')

@section('breadcrumbs')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('races.index') }}">Manage Races</a></li>
    <li class="breadcrumb-item active">Show Race Results</li>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{ $race->title }}</h3>
                        </div>
                        <!-- /.card-header -->
                            <div class="card-body">
                                <table id="results-list" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th class="w-25">Results Order</th>
                                        <th class="w-75">Rider</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($riders as $rider)
                                        <tr>
                                            <td>{{ $rider->pivot->order }}</td>
                                            <td>{{ $rider->firstName }}</td>
                                        </tr>
                                    @empty
                                        @include('layouts.scripts.noRecordsFound',['colspan' => 2])
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a type="button" href="{{ route('races.index') }}" class="btn btn-secondary pull-right">Back</a>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

