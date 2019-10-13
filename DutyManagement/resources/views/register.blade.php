<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>New user</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
 
    </head>
    <body>
    <div class="container center-block">
<form action="\new-user" method="POST">
{{ csrf_field() }}
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" class="form-control" name="name"  id="exampleFormControlInput1" placeholder="Your Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Phone Number</label>
    <input type="phone" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="01756894512">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Salary</label>
    <input type="number" name="salary" class="form-control" id="exampleFormControlInput1" placeholder="55000">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Select Card</label>
    <select class="form-control" name="card" id="exampleFormControlSelect1">
    @foreach ($cards as $card)
         <option value={{$card->id}}>{{$card->card_id}}</option>
    @endforeach
    </select>
     <div class="form-group" style="margin: 20px">
    <input type="submit" class="btn btn-primary center-block" id="exampleFormControlInput1">
  </div>
  </div>
</form>
</div>




      
        
    
    </body>

</html>
