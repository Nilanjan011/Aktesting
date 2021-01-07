@extends('layout.app')




@section('title')
Profile  
@endsection

@section('content')
<span id="error_pin"></span>
<h1>Patient Profille Form</h1>

        <form action="{{ route('patient.profille.edit',$patient->id) }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group2"style="height: 200px; width: 200px; overflow: hidden">

                        <label for="uploadFile"><img class="image" width="200" height="200" style="object-fit: cover;" src="{{asset('/patient/ProfilePic/'.$patient->pic)}}" id="imagePreview"></label>

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
                                <input type="taxt" name="patientName" value="{{$patient_user->name}}" class="form-control input-lg" id="staffName">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email:</label>								
                                <input type="email" name="patientEmail" value="{{$patient_user->email}}" class="form-control input-lg" id="staffEmail">
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
                                <label>Pin Cord:</label>								
                                <input type="taxt" name="patientPin" value="{{$patient->pin_cord}}" class="form-control input-lg" id="staffRole">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone No</label>								
                                <input type="taxt" name="patientPhNo" value="{{$patient->phone_No}}" class="form-control input-lg" id="staffPhNo">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="date"> Date of Birth</label>
                                <input id="date" name="Date_of_birth" type="date" value="{{$patient->date_of_birth}}"  class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address </label>								
                                <textarea id="Address" class="form-control input-md" name="Address" rows="3" cols="50">
                                    {{$patient->address}}
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



@section( "additional-scripts" )
<script>
 $(document).ready(function() {
    $.ajaxSetup({
			headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

    $(".left-top").on('click', '#HomeCollection', function () {
        var pin = {{$patient->pin_cord}};
        //alert(pin);

        $.ajax({
				url:"{{ route('pin_available.check') }}",
				method:"POST",
				data:{pin:pin,},
				success:function(result)
				{
					if(result == 'available')
					{
						//$('#error_pin').html('<label class="text-success">Home collection not available in your  address</label>');
						//$('#pin').removeClass('has-error');
                        //alert(pin);
                        $('#HomeCollectionModal').modal("show");
					}
					else
					{
						$('#error_pin').html('<label class="text-danger">Home collection not available in your  address</label>');
						//$('#pin').addClass('has-error');
					}
				}
			});
     });
     
     $('.modal-body #appointmentfor').change(function(){

        var id = $(this).val();
        //alert(id);
        // Empty the dropdown
        //$(".modal-body #test_id").val( data[0] );
        $('#sel_test').find('option').not(':first').remove();
        $.ajax({
        url: 'dep_test/'+id,
        type: 'get',
        success: function(response){

            var len = 0;
        if(response['data'] != null){
        len = response['data'].length;
        }
            
            // alert(response['data'].);
            //alert(len);

            
            if(len > 0){
            // Read data and create <option >
            for(var i=0; i<len; i++){

                var name = response['data'][i].test;
                //alert( name );
                var option = "<option value='"+name+"'>"+name+"</option>"; 

                $("#sel_test").append(option); 
            }
            }
            // else{

            // }

        }
        });
    });

    
});
</script>
@endsection