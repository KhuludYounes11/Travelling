@extends('adminlte::page')
@section('title', 'Hotel')

@section('content_header')
    <h1> Create Hotel </h1>
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Hotel </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-3">
  <form action="{{ route('hotel.update', ['id'=>$hotel->id]) }}" method="post">
  {{ csrf_field() }}
    <div class="mb-3 mt-3">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name Hotel" name="name" value="{{$hotel->name}}">
    </div>
    <div class="mb-3 mt-3">
      <label for="name">phone</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone" value="{{$hotel->phone}}">
    </div>
    <label for="city" class="form-label">Select City (select one):</label>
    <select class="form-select" id="city_id" name="city_id">
    <option display value="{{$hotel->city_id}}" selected>{{$hotel->city->name}}</option>
    @foreach($city as $city)
      <option value='{{$city->id}}'>{{$city->name}}</option>
      @endforeach
    </select>
    <br />
    <button type="submit" class="btn btn-primary">Update</button>
    <br />
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