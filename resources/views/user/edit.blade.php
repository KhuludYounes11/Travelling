@extends('adminlte::page')
@section('title', 'User')

@section('content_header')
    <h1>Edit User </h1>
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit User </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  @foreach($user as $user)
  <form action=" {{route('admin.update',$user->id)}}" method="post">
  {{ csrf_field() }}
    <div class="mb-3 mt-3">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="text" placeholder="Enter Name" value='{{$user->name}}' name="name">
    </div>
    <div class="mb-3 mt-3">
      <label for="date">Password</label>
      <input type="text" class="form-control" id="text" placeholder="Enter Password " value='{{$user->password}}' name="password">
    </div>
    <div class="mb-3 mt-3">
      <label for="date">Email</label>
      <input type="text" class="form-control" id="text" placeholder="Enter Email" value='{{$user->email}}' name="email">
    </div>
    @endforeach
    <div class="mb-3 mt-3">
      <label for="role">Role</label>
      <select class="form-select" id="role" name="role">
        <option value='0'>User</option>
        <option value='1'>Admin</option>
      </select>
    </div>
    <div class="mb-3 mt-3">
      <label for="status">Status</label>
      <select class="form-select" id="status" name="status">
      <option value='1'>Active</option>
      <option value='0'>Stoped</option>
      </select>
    </div>
   <br>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>

</body>
</html>
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@section('js')
    <script> console.log('Hi!'); </script>
@stop
@stop
@stop
@stop
      
        


 
   



