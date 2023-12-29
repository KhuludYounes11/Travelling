<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Customer </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Stacked form</h2>
  @foreach($customer as $customer)
  <form action=" {{route('customer.update',$customer->id)}}" method="post">
  {{ csrf_field() }}
    <div class="mb-3 mt-3">
      <label for="date">Name</label>
      <input type="text" class="form-control" id="text" placeholder="Enter Name" value='{{$customer->name}}' name="name">
    </div>
    <div class="mb-3 mt-3">
      <label for="date">Phone</label>
      <input type="text" class="form-control" id="text" placeholder="Enter Phone" value='{{$customer->phone}}' name="phone">
    </div>
    <div class="mb-3 mt-3">
      <label for="date">Email</label>
      <input type="text" class="form-control" id="text" placeholder="Enter Email" value='{{$customer->email}}' name="email">
    </div>
    <label for="sel1" class="form-label">Select Gender (select one):</label>
    <select class="form-select" id="sel1" name="gender">
    <option display selected>{{$customer->gender}}</option>
      <option value='{{$customer->gender}}'>Male</option>
      <option value='{{$customer->gender}}'>Fmale</option>
    </select>
      @endforeach
    <br>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>

</body>
</html>

      
        


 
   



