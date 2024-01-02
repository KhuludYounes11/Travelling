@extends('adminlte::page')
@section('title', 'City')

@section('content_header')
    <h1> Update City</h1>
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update City </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <form action="{{ route('city.update',['id'=>$city->id]) }}" method="post">
  {{ csrf_field() }}
    <div class="mb-3 mt-3">
      <label for="name">City</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name City" name="name" value="{{$city->name}}">
    </div>
    <div class="mb-3 mt-3">
      <label for="country">Country</label>
      <input type="text" class="form-control" id="country" placeholder="Enter Name Country" name="country" value="{{$city->country}}">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Update</button>
    <br>
    <h3> <a href="{{route('city.index')}}"class=" btn btn-secondary">Back</a></h3>
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