@extends('layout.app')

@section( "additional-header" )
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('title')
    Appoint List 
@endsection


@section('content')

  
<h1>Show all Pending Appointment</h1>
<div class="table-responsive">
    <table id="example" class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th> Name</th>
                    <th> Email</th>
                    <th>Date of birth</th>
                    <th>Gender</th>
                    <th>Contact</th>
                    <th>Department</th>
                    <th>Preferred_date</th>
                    <th>Description</th>
                    <th>Status</th>
                    
                </tr>
            </thead>
        <tbody>
        @foreach($appoints as $appointPanddind)
                <tr>
                    <td>{{$appointPanddind->id}}</td>
                    <td>{{$appointPanddind->Name}}</td>
                    <td>{{$appointPanddind->Email}}</td>
                    <td>{{$appointPanddind->Date_of_Birth}}</td>
                    <td>{{$appointPanddind->Gender}}</td>
                    <td>{{$appointPanddind->Contact}}</td>
                    <td>{{$appointPanddind->Department}}</td>
                    <td>{{$appointPanddind->Preferred_date}}</td>
                    <td>{{$appointPanddind->Description}}</td>
                    <td></td>
                    
                    
                </tr>
            @endforeach  
        </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th> Name</th>
                    <th> Email</th>
                    <th>Date of birth</th>
                    <th>Gender</th>
                    <th>Contact</th>
                    <th>Department</th>
                    <th>Preferred_date</th>
                    <th>Description</th>
                    <th>Status</th>
                    
                </tr>
            </tfoot>
    </table>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Approve Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
            <form method="POST" action="{{route('appointment.approve')}}">
                @csrf
                <input type="hidden" name="test_id" id="test_id" >
                <div class="form-group">
                    <label>Time:</label>								
                    <input type="taxt" name="test_time" class="form-control input-lg" id="test_time">
                </div>
            
                <button class="btn btn-primary">Save Approve</button>
        </form>
        </div>
        </div>
    </div>
</div>

@endsection

@section( "additional-scripts" )

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
    var datatable = $('#example').DataTable( {
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "scrollY": 200,
            "scrollX": true,
            "defaultContent": "<button class='btn btn-link edit-btn'><i class='fa fa-download'></i></button>"
        },]
    } );

    $('#example tbody').on( 'click', '.edit-btn', function () {
        var data = datatable.row( $(this).parents('tr') ).data();
        
        window.location.href = "patient/reportDownload/" + data[0];
    } );

   

    // published toggle button callback
   
    
} );


</script>

@endsection