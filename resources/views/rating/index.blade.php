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
  <h2>Ratings</h2>
  <form class="form-inline my-2 my-lg-0" method='get' action="{{route('rating.search')}}">
  <input class="form-control" id="myInput" type="text" name="search" placeholder="Search..">
  <button class="btn btn primary" type='submit' >Search</button>
</form>
  <td> <a  href="{{route('rating.create')}}" class="btn btn-light">ADD</a></td>      
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Hotel</th>
        <th>Star</th>
        <th>Comment</th>
        <th>Action</th>
        <th>Action</th>
        <th>Action</th>
      </tr>
    </thead>
    @foreach($ratings as $rating)
    <tbody>
   
      <tr>
        <td>{{$rating->id}}</td>
        <td>{{$rating->customer->name}}</td>
        <td>{{$rating->hotel->name}}</td>
        <td>{{$rating->star}}</td>
        <td>{{$rating->comment}}</td>
        <td> <a  href="{{route('rating.show',[$rating->id])}}" class="btn btn-danger">Show</a></td>
        <td> <a  href="{{route('rating.edit',[$rating->id])}}" class="btn btn-success">Edit</a></td>
        <td> <a  href="{{route('rating.delete',[$rating->id])}}" class="btn btn-secondary">Delete</a></td>
      </tr>
     
    </tbody>
    @endforeach
  </table>
  <h3> <a href="{{route('home')}}"class=" btn btn-secondary">Back</a></h3></div>
</div>

</body>
</html>
