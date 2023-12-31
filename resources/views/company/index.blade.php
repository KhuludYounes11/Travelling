@extends('adminlte::page')
@section('title', 'Company')

@section('content_header')
    <h1> Company</h1>
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
  <form class="form-inline my-2 my-lg-0" method='get' action="{{route('company.search')}}">
    <input class="form-control" id="myInput" type="text" name="search" placeholder="Search..">
    <button class="btn btn primary" type='submit' >Search</button>
  </form>
  <td> <a  href="{{route('company.create')}}" class="btn btn-light">ADD</a></td>      
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Action</th>
        <th>Action</th>
        <th>Action</th>
      </tr>
    </thead>
    @foreach($company as $company)
    <tbody>
   
      <tr>
        <td>{{$company->id}}</td>
        <td>{{$company->name}}</td>
        <td>{{$company->phone}}</td>
        <td> <a  href="{{route('company.show',[$company->id])}}" class="btn btn-danger">Show</a></td>
        <td> <a  href="{{route('company.edit',[$company->id])}}" class="btn btn-success">Edit</a></td>
        <td> <a  href="{{route('company.delete',[$company->id])}}" class="btn btn-secondary">Delete</a></td>
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