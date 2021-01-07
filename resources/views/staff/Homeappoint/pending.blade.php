@extends('admin.layouts.apps')

@section( "additional-header" )
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
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
                    <th>Test</th>
                    <th>Date</th>
                    <th>Address</th>
                    <th>Pin</th>
                    <th>Description</th>
                    <th>Status</th>
                    
                </tr>
            </thead>
        <tbody>
        @foreach($appointPanddinds as $appointPanddind)
                <tr>
                    <td>{{$appointPanddind->id}}</td>
                    <td>{{$appointPanddind->Name}}</td>
                    <td>{{$appointPanddind->Email}}</td>
                    <td>{{$appointPanddind->Date_of_Birth}}</td>
                    <td>{{$appointPanddind->Gender}}</td>
                    <td>{{$appointPanddind->Contact}}</td>
                    <td>{{$appointPanddind->Department}}</td>
                    <td>{{$appointPanddind->Department}}</td>
                    <td>{{$appointPanddind->Preferred_date}}</td>
                    <td>{{$appointPanddind->Preferred_date}}</td>
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
                    <th>Test</th>
                    <th>Date</th>
                    <th>Address</th>
                    <th>Pin</th>
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
            <form method="POST" action="#">
                @csrf
                <div class="form-group">
                    <label>Time:</label>								
                    <input type="taxt" name="staffName" class="form-control input-lg" id="staffName">
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
            "defaultContent": "<button class='btn btn-link edit-btn'><i class='fa fa-edit'></i></button><button class='btn btn-link delete-btn'><i class='fa fa-trash'></i></button>"
        },]
    } );

    $('#example tbody').on( 'click', '.edit-btn', function () {
        var data = datatable.row( $(this).parents('tr') ).data();
        $('#myModal').modal("show"); 
        //window.location.href = "#" + data[0];
    } );

    $('#example tbody').on( 'click', '.delete-btn', function () {
        var data = datatable.row( $(this).parents('tr') ).data();
        var deleteConfirm = confirm( "This Appointment will be deleted permanently!" );
        
        if ( deleteConfirm ) {
            window.location.href = "/appointment/cancel/" + data[0];
        }
    } );

    // published toggle button callback
    $('#example tbody').on( 'change', '.trending-car', function () {
        var toggleBtn = $(this);
        toggleBtn.prop( "disabled", true );
        toggleBtn.parents().eq(1).append( "<img src={{ asset( '/img/gif-loader.gif' ) }} width='15' class='ml-1' />" );
        var data = datatable.row( $(this).parents('tr') ).data();
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        
        $.ajax( {
            type: "post",
            url: "#",
            data: { _token: csrfToken, cartId: data[0] },
            dataType: "json",
            success: function( response ) {
                alert(response.message);
                //adminAlert( response.status, response.msg );
                toggleBtn.prop( "disabled", false );
                toggleBtn.parents().eq(1).find( "img" ).remove();
            }
        } );
    } );
} );


</script>

@endsection