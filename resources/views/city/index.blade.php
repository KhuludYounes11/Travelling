@extends('adminlte::page')
@section('title', 'City')

@section('content_header')
    <h1>City</h1>
@section('content')
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
  <div class="mb-3 mt-3">
    {{ csrf_field() }}
    <form class="form-inline my-2 my-lg-0" method='get' action="{{route('city.search')}}">
      <input class="form-control" id="myInput" type="text" name="search" placeholder="Search..">
      <button class="btn btn primary" type='submit' >Search</button>
    </form>
  </div>
  <td> <a  href="{{route('city.create')}}" class="btn btn-light">ADD</a></td>      
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>City</th>
        <th>Country</th>
        <th>Action</th>
        <th>Action</th>
        <th>Action</th>
      </tr>
    </thead>
    @foreach($city as $city)
    <tbody>
   
      <tr>
        <td>{{$city->id}}</td>
        <td>{{$city->name}}</td>
        <td>{{$city->country}}</td>
        <td> <a  href="{{route('city.show',[$city->id])}}" class="btn btn-danger">Show</a></td>
        <td> <a  href="{{route('city.edit',[$city->id])}}" class="btn btn-success">Edit</a></td>
        <td> <a  href="{{route('city.delete',[$city->id])}}" class="btn btn-secondary">Delete</a></td>
      </tr>
     
    </tbody>
    @endforeach
  </table>
  <h3> <a href="{{route('home')}}"class=" btn btn-secondary">Back</a></h3></div>
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