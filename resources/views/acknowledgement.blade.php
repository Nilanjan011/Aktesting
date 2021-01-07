<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acknowledgement</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" /> -->
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">Acknowledgement</h2>

    

        <table class="table table-bordered mb-5">
            
            <tbody>
                @foreach($employee ?? '' as $data)
                <tr>
                    <td>Appoint Id</td>
                    <td>{{ $data->id}}</td>
                </tr>
                <tr>
                    <td>Patient Name</td>
                    <td>{{ $data->Name}}</td>
                </tr>
                <tr>
                    <td>Patient Contact</td>
                    <td>{{ $data->Contact}}</td>
                </tr>
                <tr>
                    <td>Test Department</td>
                    <td>{{ $data->Department}}</td>
                </tr>
                <tr>
                    <td>Appoint Date</td>
                    <td>{{ $data->Preferred_date}}</td>
                </tr>
                <tr>
                    <td>Appoint Status</td>
                    <td>{{ $data->Status}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>

    </div>

    <script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>