@extends('adminlte::page')
@section('title', 'Hotel')

@section('content_header')
    <h1> Create Hotel </h1>
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Hotel </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <form action="{{ route('hotel.store') }}" method="post">
  {{ csrf_field() }}
    <div class="mb-3 mt-3">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name Hotel" name="name">
    </div>
    <div class="mb-3 mt-3">
      <label for="name">phone</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
    </div>
    <label for="city" class="form-label">Select City (select one):</label>
    <select class="form-select" id="city_id" name="city_id">
    <option display selected>choose the city</option>
    @foreach($city as $city)
      <option value='{{$city->id}}'>{{$city->name}}</option>
      @endforeach
    </select>
    <br>
    <button type="submit" class="btn btn-primary">Save</button>
    <br>
    <h3> <a href="{{route('hotel.index')}}"class=" btn btn-secondary">Back</a></h3>
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