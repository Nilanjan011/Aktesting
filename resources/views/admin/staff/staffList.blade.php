@extends('admin.layouts.app')

@section( "additional-header" )
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('title')
    Staff List 
@endsection


@section('content')

  
<h1>Show all Pending Appointment</h1>
<table id="example" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Staff Name</th>
                <th>staff Email</th>
                <th>Date of birth</th>
                <th>Gender</th>
                <th>Role</th>
                <th>address</th>
                <th>Phon No</th>
                <th>Action</th>
                
            </tr>
        </thead>
       <tbody>
       @foreach($staffLists as $staffList)
            <tr>
                <td>{{$staffList->id}}</td>
                <td>{{$staffList->name}}</td>
                <td>{{$staffList->email}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                
                
            </tr>
        @endforeach  
       </tbody>
        <tfoot>
            <tr>
            <th>Id</th>
                <th>Staff Name</th>
                <th>staff Email</th>
                <th>Date of birth</th>
                <th>Gender</th> `
                <th>Role</th>
                <th>address</th>
                <th>Phon No</th>
                <th>Action</th>
            </tr>
        </tfoot>
</table>



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
        window.location.href = "/stafflist/edit/" + data[0];
    } );

    $('#example tbody').on( 'click', '.delete-btn', function () {
        var data = datatable.row( $(this).parents('tr') ).data();
        var deleteConfirm = confirm( "This staff will be deleted permanently!" );
        
        if ( deleteConfirm ) {
            window.location.href = "/stafflist/deleted/" + data[0];
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