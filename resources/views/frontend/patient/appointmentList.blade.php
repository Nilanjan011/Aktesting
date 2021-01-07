@extends('layout.app')

@section('title')
Appointment List  
@endsection

@section( "additional-header" )
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection


@section('content')

  
<h1>Show All Appointment</h1>
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
                    <td>{{$appointPanddind->Status}}
                   
                    
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


@endsection

@section( "additional-scripts" )

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
    var datatable = $('#example').DataTable( {
        "columnDefs": [{
            
            "data": null,
            "scrollY": 200,
            "scrollX": true,
            
        },]
    } );

    
} );


</script>

@endsection