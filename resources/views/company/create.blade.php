<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Company </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Company</h2>
  <form action="{{ route('company.store') }}" method="post">
  {{ csrf_field() }}
    <div class="mb-3 mt-3">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name Hotel" name="name">
    </div>
    <div class="mb-3 mt-3">
      <label for="name">phone</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Save</button>
    <br>
    <h3> <a href="{{route('company.index')}}"class=" btn btn-secondary">Back</a></h3>
  </form>
</div>
</body>
</html>