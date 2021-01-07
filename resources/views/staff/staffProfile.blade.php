@extends('admin.layouts.apps')




@section('title')
Profile  
@endsection

@section('content')
<h1>Staff Addtion Form</h1>

        <form action="{{ route('staff.profille.edit',$staff->id) }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group2"style="height: 200px; width: 200px; overflow: hidden">

                        <label for="uploadFile"><img class="image" width="200" height="200" style="object-fit: cover;" src="{{asset('/staff/ProfilePic/'.$staff->pic)}}" id="imagePreview"></label>

                            <input type="file" id="uploadFile" name="uploadFile" accept="image/*" style="display: none;" class="img" alt="Avatar">
                            
                            <script type="text/javascript">
                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();
                                    
                                    reader.onload = function (e) {
                                        $('#imagePreview').attr('src', e.target.result);
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                            $("#uploadFile").change(function(){
                                readURL(this);
                            });
                            </script>
                    </div>
                </div>
	            <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name:</label>								
                                <input type="taxt" name="staffName" value="{{$staff_user->name}}" class="form-control input-lg" id="staffName">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email:</label>								
                                <input type="email" name="staffEmail" value="{{$staff_user->email}}" class="form-control input-lg" id="staffEmail">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gender </label>								
                                <select id="time" name="Gender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>    
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Role:</label>								
                                <input type="taxt" name="staffRole" value="{{$staff->role}}" class="form-control input-lg" id="staffRole">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone No</label>								
                                <input type="taxt" name="staffPhNo" value="{{$staff->phone_No}}" class="form-control input-lg" id="staffPhNo">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="date"> Date of Birth</label>
                                <input id="date" name="Date_of_birth" type="date" value="{{$staff->date_of_birth}}"  class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address </label>								
                                <textarea id="Address" class="form-control input-md" name="Address" rows="3" cols="50">
                                    {{$staff->address}}
                                </textarea>
                            </div>
                        </div>
                    
                        <div class="col-md-12">
                            <div class="form-group">
                                <button name="btn_submit" type="submit" class="btn btn-info btn-flat btn-lg justify-content-md-center" value="true"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection