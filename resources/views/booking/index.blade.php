<!DOCTYPE html>
<html lang="en">
<head>
  <title>Fly Zone & Travel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Bookings</h2>
  <form class="form-inline my-2 my-lg-0" method='get' action="{{route('booking.search')}}">
  <input class="form-control" id="myInput" type="text" name="search" placeholder="Search..">
  <button class="btn btn primary" type='submit' >Search</button>
</form>
  <td> <a  href="{{route('booking.create')}}" class="btn btn-light">ADD</a></td>      
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Hotel</th>
        <th>Ticket</th>
        <th>Date</th>
        <th>Action</th>
        <th>Action</th>
        <th>Action</th>
      </tr>
    </thead>
    @foreach($bookings as $booking)
    <tbody id="myTable">
   
      <tr>
        <td>{{$booking->id}}</td>
        <td>{{$booking->customer->name}}</td>
        <td>{{$booking->hotel->name}}</td>
        <td>{{$booking->ticket_id}}</td>
        <td>{{$booking->date}}</td>
        <td> <a  href="{{route('booking.show',[$booking->id])}}" class="btn btn-danger">Show</a></td>
        <td> <a  href="{{route('booking.edit',[$booking->id])}}" class="btn btn-success">Edit</a></td>
        <td> <a  href="{{route('booking.delete',[$booking->id])}}" class="btn btn-secondary">Delete</a></td>
      </tr>
     
    </tbody>
    @endforeach
  </table>
  <h3> <a href="{{route('home')}}"class=" btn btn-secondary">Back</a></h3></div>
</div>
</body>
</html>


