<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Customer </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Stacked form</h2>
  <form action="{{ route('customer.store') }}" method="post">
  {{ csrf_field() }}
    <div class="mb-3 mt-3">
      <label for="date">Name</label>
      <input type="text" class="form-control" id="text" placeholder="Enter Name" name="name">
    </div>
    <div class="mb-3 mt-3">
      <label for="date">Phone</label>
      <input type="text" class="form-control" id="text" placeholder="Enter Phone" name="phone">
    </div>
    <div class="mb-3 mt-3">
      <label for="date">Email</label>
      <input type="text" class="form-control" id="text" placeholder="Enter Email" name="email">
    </div>
  
    <label for="sel1" class="form-label">Select Gender (select one):</label>
    <select class="form-select" id="sel1" name="gender">
    <option display selected>Choose Gender</option>
      <option value='male'>Male</option>
      <option value='fmale'>Fmale</option>
    </select>

    <button type="submit" class="btn btn-primary">Save</button>
    <h3> <a href="{{route('customer.index')}}"class=" btn btn-secondary">Back</a></h3>
  </form>
</div>

</body>
</html>

      
        


 
   



