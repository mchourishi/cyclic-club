<div class="card-body">
    <div class="form-group row">
        <label for="firstName" class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm-8">
            <input type="text"
                   class="form-control {{ $errors->has('firstName') ? 'is-invalid' : '' }}" id="firstName"
                   name="firstName"
                   placeholder="Enter First Name" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="lastName" class="col-sm-2 col-form-label">Last Name</label>
        <div class="col-sm-8">
            <input type="text"
                   class="form-control {{ $errors->has('lastName') ? 'is-invalid' : '' }}" id="lastName" name="lastName"
                   placeholder="Enter Last Name" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="grading" class="col-sm-2 col-form-label">Grading</label>
        <div class="col-sm-8">
            <input type="text"
                   class="form-control {{ $errors->has('grading') ? 'is-invalid' : '' }}" id="grading" name="grading"
                   placeholder="Enter Grading" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="age" class="col-sm-2 col-form-label">Age</label>
        <div class="col-sm-8">
            <input type="text"
                   class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" id="age" name="age"
                   placeholder="Enter Age" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
        <div class="col-sm-8">
            <select name="gender" id="club_id" class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}"
                    required>
                <option value="">Choose Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="status" class="col-sm-2 col-form-label">Club</label>
        <div class="col-sm-8">
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
</div>
<!-- /.card-body -->

<div class="card-footer">
    <a type="button" href="{{ route('riders.create') }}" class="btn btn-secondary">Cancel</a>
    <button type="submit" id="createRider" name="createRider" class="btn btn-primary pull-right">Submit</button>
</div>

@section('inline-js')
    @parent
@endsection
