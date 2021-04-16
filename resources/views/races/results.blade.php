@extends('layouts.common.master')

@section('breadcrumbs')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('races.index') }}">Manage Races</a></li>
    <li class="breadcrumb-item active">Add Race Results</li>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Results : {{ \App\Race::whereId($race_id)->first()->title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <form class="form-horizontal" method="POST" action="{{ route('results.store') }}">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <table id="results-list" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Results Order</th>
                                        <th>Rider</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($riders as $rider)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <select name="rider[{{$loop->iteration}}]" id="rider" class="form-control">
                                                    <option value="">Select Rider</option>
                                                    @foreach($riders as $rider)
                                                        <option value="{{$rider->id}}">
                                                            {{$rider->firstName." ".$rider->lastName}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" name="race_id" id="race_id" value="{{ $race_id }}">
                                            </td>
                                        </tr>
                                    @empty
                                        @include('layouts.scripts.noRecordsFound',['colspan' => 2])
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a type="button" href="{{ route('races.index') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

