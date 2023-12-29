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
  <h2>Customers</h2>
  <form class="form-inline my-2 my-lg-0" method='get' action="{{route('customer.search')}}">
  <input class="form-control" id="myInput" type="text" name="search" placeholder="Search..">
  <button class="btn btn primary" type='submit' >Search</button>
</form>
  <td> <a  href="{{route('customer.create')}}" class="btn btn-light">ADD</a></td>      
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Action</th>
        <th>Action</th>
        <th>Action</th>
      </tr>
    </thead>
    @foreach($customers as $customer)
    <tbody id="myTable">
   
      <tr>
        <td>{{$customer->id}}</td>
        <td>{{$customer->name}}</td>
        <td>{{$customer->phone}}</td>
        <td>{{$customer->gender}}</td>
        <td>{{$customer->email}}</td>
        <td> <a  href="{{route('customer.show',[$customer->id])}}" class="btn btn-danger">Show</a></td>
        <td> <a  href="{{route('customer.edit',[$customer->id])}}" class="btn btn-success">Edit</a></td>
        <td> <a  href="{{route('customer.delete',[$customer->id])}}" class="btn btn-secondary">Delete</a></td>
      </tr>
     
    </tbody>
    @endforeach
  </table>
  <h3> <a href="{{route('home')}}"class=" btn btn-secondary">Back</a></h3></div>
</div>
</body>
</html>


