<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
 
    </head>
    <body>
       <table id="example" class="table table-striped table-bordered" style="width:100%,margin:2%">
        <thead>
        
        
            <tr>
                <th>Date</th>
                <th>In Time</th>
                <th>Out Time</th>
                <th>Hours</th>
                <th>Est. Leaving Time</th>
                <th>Income</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $dt)
             <tr>
                <td>{{\Carbon\Carbon::parse($dt->enter_time)->format('jS \\of F Y, l')}}</td>
                <td>{{$enter_time = \Carbon\Carbon::parse($dt->enter_time)->format('h:i:s A') }}</td>
                <td>{{$exit_time = \Carbon\Carbon::parse($dt->exit_time)->format('h:i:s A')}}</td>
                <td>{{$hour= gmdate('H:i:s', \Carbon\Carbon::parse($exit_time)->subMinute(30)->diffInSeconds($enter_time))}}</td>
                <td>{{\Carbon\Carbon::parse($enter_time)->addMinutes(530)->format('h:i:s A')}}</td>
                <td>{{($dt->employee->salary)}}</td>
            </tr>
        @endforeach
           
           
            
        </tbody>
        <tfoot>
            <tr>
              <th>Date</th>
                <th>In Time</th>
                <th>Out Time</th>
                <th>Hours</th>
                <th>Est. Leaving Time</th>
                <th>Income</th>
            </tr>
        </tfoot>
    </table>
         <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#example').DataTable();
} );</script>
    </body>

</html>
