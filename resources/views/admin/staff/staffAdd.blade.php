@extends('admin.layouts.app')

@section('title')
Staff Add  
@endsection

@section('content')
<h1>Staff Addtion Form</h1>
<form action="{{ route('staffSubmit') }}" method="POST" enctype='multipart/form-data'>
    @csrf
    <div class="form-group">
        <label>Staff Name:</label>								
        <input type="taxt" name="staffName" class="form-control input-lg" id="staffName">
    </div>
    <div class="form-group">
        <label>Staff Email:</label>								
        <input type="email" name="staffEmail" class="form-control input-lg" id="staffEmail">
    </div>
    <div class="form-group">
        <label>Staff Role:</label>								
        <input type="taxt" name="staffRole" class="form-control input-lg" id="staffRole">
    </div>
    <div class="form-group">
        <label>Staff password:</label>								
        <input type="text" name="staffpassword" class="form-control input-lg" id="staffpassword">
    </div>
    <div class="form-group">
        <button name="btn_submit" type="submit" class="btn btn-info btn-flat btn-lg pull-right" value="true"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save Staff</button>
    </div>
</form>

@endsection