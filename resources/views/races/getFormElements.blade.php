<div class="card-body">
    <div class="form-group row">
        <label for="status" class="col-sm-2 col-form-label">Club</label>
        <div class="col-sm-10">
            <select name="club_id" id="club_id" class="form-control {{ $errors->has('club_id') ? 'is-invalid' : '' }}"
                    required>
                <option value="">Choose Club</option>
                @foreach ($clubs as $club)
                    <option value="{{ $club->id }}">
                        {{ $club->title }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text"
                   class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title"
                   name="title"
                   placeholder="Enter Title" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="address" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
            <input type="text"
                   class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="address" name="address"
                   placeholder="Enter Address" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="date_time" class="col-sm-2 col-form-label">Date & Time</label>
        <div class="col-sm-10">
            <div class="input-group date">
                <input id="date_time" name="date_time" placeholder="Enter Date & Time"
                       value="{{\Carbon\Carbon::now()->format('d-m-Y H:i')}}"
                       class="form-control" required>
                <div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="riders" class="col-sm-2 col-form-label">Riders</label>
        <div class="col-sm-10">
            <div class="select2-purple">
                <select class="select2" id="riders" name="riders[]" multiple="multiple" data-placeholder="Select Riders..." data-dropdown-css-class="select2-purple" style="width: 100%;">
                    @foreach($riders as  $rider)
                        <option value="{{$rider->id}}">
                            {{$rider->firstName." ".$rider->lastName}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="status" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
            <select name="status" id="status" class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}"
                    required>
                <option value="">Choose Status</option>
                <option value="pending">Pending</option>
                <option value="complete">Complete</option>
            </select>
        </div>
    </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
    <a type="button" href="{{ route('races.index') }}" class="btn btn-secondary">Cancel</a>
    <button type="submit" id="createRace" name="createRace" class="btn btn-primary pull-right">Submit</button>
</div>
@section('inline-js')
    <script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('js/select2.full.min.js')}}"></script>
    <script>
        $(function () {
            //Date and time picker
            $('#date_time').datetimepicker({
                format: 'dd-mm-yyyy hh:ii',
                autoclose: true,
                initialDate: new Date(),
                todayBtn: true,
            });

            // Riders
            $('.select2').select2();
        });
    </script>
    @parent
@endsection
