@extends('adminlte::page')
@section('title', 'Ticket')

@section('content_header')
    <h1>Tickets</h1>
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
  {{ csrf_field() }}
  <div class="mb-3 mt-3">
    <form class="form-inline my-2 my-lg-0" method='get' action="{{route('ticket.search')}}">
      <input class="form-control" id="myInput" type="text" name="search" placeholder="Search..">
      <button class="btn btn primary" type='submit' >Search</button>
    </form>
  </div>
  <td> <a  href="{{route('ticket.create')}}" class="btn btn-light">ADD</a></td>      
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Company</th>
        <th>City</th>
        <th>Date Start</th>
        <th>Date End</th>
        <th>Action</th>
        <th>Action</th>
        <th>Action</th>
      </tr>
    </thead>
    @foreach($ticket as $ticket)
    <tbody>
   
      <tr>
        <td>{{$ticket->id}}</td>
        <td>{{$ticket->company->name}}</td>
        <td>{{$ticket->city->name}}</td>
        <td>{{$ticket->date_s}}</td>
        <td>{{$ticket->date_e}}</td>
        <td> <a  href="{{route('ticket.show',[$ticket->id])}}" class="btn btn-danger">Show</a></td>
        <td> <a  href="{{route('ticket.edit',[$ticket->id])}}" class="btn btn-success">Edit</a></td>
        <td> <a  href="{{route('ticket.delete',[$ticket->id])}}" class="btn btn-secondary">Delete</a></td>
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