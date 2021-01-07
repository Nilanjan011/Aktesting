@extends('admin.layouts.apps')
@section( "additional-header" )
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" 
	integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

@endsection

@section('title')
    Report Upload 
@endsection
@section('content')

<h1>Report Upload </h1>
<form action="{{ route('TestreportSubmit') }}" method="POST" enctype='multipart/form-data'>
    @csrf

    <div class="form-group">
        <label>Appointment id:</label>								
        <input type="taxt" name="Test_id" class="form-control input-lg" id="Test_id">
        <span id="error_Test_id"></span>
    </div>


    <div class="row">
			<div class="col-md-6">   
				<div class="form-group row">
					<label for="carImage"> Report file</label>
					<div class="col-md-6">
						<input id="reportFile" type="file" name="reportFile" required="">

					</div>
				</div>
			</div>
		</div>

    <div class="form-group">
        <label class="control-label col-md-3">Upload Report</label>
        <div class="col-md-8">
            <div class="row">
                <div id="demo" style="width:100%"></div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button id="btn" name="btn_submit" type="submit" class="btn btn-info btn-flat btn-lg pull-right" value="true"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save Staff</button>
    </div>

@endsection


@section( "additional-scripts" )

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- <script type="text/javascript" src="/dist/js/spartan-multi-image-picker.js"></script> -->
<script src="{{ asset('multi_image_plugin/js/spartan-multi-image-picker.js') }}"></script>
<script>
$( document ).ready(function() {
	$("#demo").spartanMultiImagePicker({
        fieldName:        'fileUpload[]',
				maxCount:         5,
				rowHeight:        '200px',
				groupClassName:   'col-md-4 col-sm-4 col-xs-6',
				maxFileSize:      '',
				
	});
    $("#btn").attr("disabled", true);
    $('#Test_id').blur(function(){
			var Test_id = $('#Test_id').val();
			$.ajax({
				url:"{{ route('report_available.check') }}",
				method:"get",
				data:{Test_id:Test_id,},
				success:function(result)
				{
					if(result == 'available')
					{
						$('#error_Test_id').html('<label class="text-success">Reprt Upload Here</label>');
						$('#Test_id').removeClass('has-error');
                        $("#btn").attr("disabled", false);
						}
					else
					{
						$('#error_Test_id').html('<label class="text-danger">Reprt Alredy Uploaded</label>');
						$('#Test_id').addClass('has-error');
					}
				}
			});
		});


});
</script>


@endsection