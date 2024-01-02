@extends('adminlte::page')
@section('title', 'Ticket')

@section('content_header')
    <h1>Edit Ticket </h1>
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Ticket </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <form action="{{ route('ticket.store') }}" method="post">
  {{ csrf_field() }}
  <label for="company_id" class="form-label">Select Company (select one):</label>
  <select class="form-select" id="company_id" name="company_id">
      <option display selected value="{{$ticket->company_id}}">{{$ticket->company->name}}</option>
      @foreach($company as $company)
      <option value='{{$company->id}}'>{{$company->name}}</option>
      @endforeach
    </select>
  <label for="city_id" class="form-label">Select City (select one):</label>
  <select class="form-select" id="city_id" name="city_id">
      <option display value="{{$ticket->city_id}}" selected>{{$ticket->city->name}}</option>
      @foreach($city as $city)
      <option value='{{$city->id}}'>{{$city->name}}</option>
      @endforeach
    </select>
    
      <label for="date_s">Date Start</label>
      <input type="date" class="form-control" id="date_s" placeholder="Enter Date Start" name="date_s" value="{{$ticket->date_s}}">
    
    
        <label for="date_e">Date End</label>
        <input type="date" class="form-control" id="date_e" placeholder="Enter Date End" name="date_e" value="{{$ticket->date_e}}">
      
    <br>
    <button type="submit" class="btn btn-primary">Update</button>
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