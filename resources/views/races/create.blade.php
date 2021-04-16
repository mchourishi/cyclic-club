@extends('layouts.common.master')

@section('inline-css')
    <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcrumbs')
    @parent
    <li class="breadcrumb-item"><a href="{{ route('races.index') }}">Manage Races</a></li>
    <li class="breadcrumb-item active">Create Race</li>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8 mx-auto">
                    <!-- general form elements -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Create Race</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal"  method="POST" action="{{ route('races.store') }}">
                        {{ csrf_field() }}
                            @include('races.getFormElements')
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

