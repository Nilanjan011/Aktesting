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
                    <th>Preferred_date</th>
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
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Modal header</h3>
    </div>
    <div class="modal-body">
        <form>
            <div class="form-group">
                <label>Time:</label>								
                <input type="taxt" name="staffName" class="form-control input-lg" id="staffName">
            </div>
        
            <button class="btn btn-primary">Save changes</button>
        </form>
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
            "defaultContent": "<button class='btn btn-link edit-btn'><i class='fa fa-edit'></i></button><button class='btn btn-link delete-btn'><i class='fa fa-trash'></i></button>"
        },]
    } );

    $('#example tbody').on( 'click', '.edit-btn', function () {
        var data = datatable.row( $(this).parents('tr') ).data();
        $('#my-modal').modal("toggle"); 
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