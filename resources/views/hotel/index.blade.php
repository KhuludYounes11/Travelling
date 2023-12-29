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
  <h2>Hotels</h2>
  <div class="mb-3 mt-3">
    {{ csrf_field() }}
  <form class="form-inline my-2 my-lg-0" method='get' action="{{route('hotel.search')}}">
    <input class="form-control" id="myInput" type="text" name="search" placeholder="Search..">
    <button class="btn btn primary" type='submit' >Search</button>
  </form>
  </div>
  <td> <a  href="{{route('hotel.create')}}" class="btn btn-light">ADD</a></td>      
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Hotel</th>
        <th>Phone</th>
        <th>City</th>
        <th>Action</th>
        <th>Action</th>
        <th>Action</th>
      </tr>
    </thead>
    @foreach($hotel as $hotel)
    <tbody>
   
      <tr>
        <td>{{$hotel->id}}</td>
        <td>{{$hotel->name}}</td>
        <td>{{$hotel->phone}}</td>
        <td>{{$hotel->city->name}}</td>
        <td> <a  href="{{route('hotel.show',[$hotel->id])}}" class="btn btn-danger">Show</a></td>
        <td> <a  href="{{route('hotel.edit',[$hotel->id])}}" class="btn btn-success">Edit</a></td>
        <td> <a  href="{{route('hotel.delete',[$hotel->id])}}" class="btn btn-secondary">Delete</a></td>
      </tr>
     
    </tbody>
    @endforeach
  </table>
  <h3> <a href="{{route('home')}}"class=" btn btn-secondary">Back</a></h3></div>
</div>

</body>
</html>