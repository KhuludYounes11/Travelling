@extends('adminlte::page')
@section('title', 'Ticket')

@section('content_header')
    <h1>Create Ticket </h1>
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Ticket </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Ticket</h2>
  <form action="{{ route('ticket.store') }}" method="post">
  {{ csrf_field() }}
  <label for="company_id" class="form-label">Select Company (select one):</label>
  <select class="form-select" id="company_id" name="company_id">
      <option display selected>choose the company</option>
      @foreach($company as $company)
      <option value='{{$company->id}}'>{{$company->name}}</option>
      @endforeach
    </select>
  <label for="city_id" class="form-label">Select City (select one):</label>
  <select class="form-select" id="city_id" name="city_id">
      <option display selected>choose the city</option>
      @foreach($city as $city)
      <option value='{{$city->id}}'>{{$city->name}}</option>
      @endforeach
    </select>
    
      <label for="date_s">Date Start</label>
      <input type="date" class="form-control" id="date_s" placeholder="Enter Date Start" name="date_s">
    
    
        <label for="date_e">Date End</label>
        <input type="date" class="form-control" id="date_e" placeholder="Enter Date End" name="date_e">
      
    <br>
    <button type="submit" class="btn btn-primary">Save</button>
    <br>
    <h3> <a href="{{route('ticket.index')}}"class=" btn btn-secondary">Back</a></h3>
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