@extends('admin.layouts.app')



@section('content')
<h1>Staff Addtion Form</h1>
<form action="{{ route('staff.edit.submit',$staff_user->id) }}" method="POST" enctype='multipart/form-data'>
    @csrf
    <div class="form-group">
        <label>Staff Name:</label>								
        <input type="taxt" name="staffName" value="{{$staff_user->name}}" class="form-control input-lg" id="staffName">
    </div>
    <div class="form-group">
        <label>Staff Email:</label>								
        <input type="email" name="staffEmail" value="{{$staff_user->email}}" class="form-control input-lg" id="staffEmail">
    </div>
    <div class="form-group">
        <label>Staff Role:</label>								
        <input type="taxt" name="staffRole" value="{{$staff->role}}" class="form-control input-lg" id="staffRole">
    </div>
    
    <div class="form-group">
        <button name="btn_submit" type="submit" class="btn btn-info btn-flat btn-lg pull-right" value="true"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update </button>
    </div>
</form>

<form action="{{ route('staff.change.password',$staff_user->id) }}" method="post" enctype='multipart/form-data'>
    <div class="form-group">
        <label>Change Staff password:</label>								
        <input type="text" name="staffpassword" class="form-control input-lg" id="staffpassword">
    </div>
    <div class="form-group">
        <button name="btn_submit" type="submit" class="btn btn-info btn-flat btn-lg pull-right" value="true"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update Password</button>
    </div>
</form>

@endsection