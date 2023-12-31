@extends('adminlte::page')

@section('title', 'Bookings')

@section('content_header')
    <h1>Show Booking </h1>
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
  @foreach($booking as $booking)
  <h2>Show Booking {{$booking->id}} </h2>
  <ul class="list-group">
  <li class="list-group-item">Customer Name is : {{$booking->customer->name}}</li>
  <li class="list-group-item">Ticket To : {{$booking->ticket->city->name}}</li>
  <li class="list-group-item">Ticket With Company : {{ $booking->ticket->company->name }}</li>
  <li class="list-group-item">Hotel is : {{$booking->hotel->name}}</li>
  <li class="list-group-item">Date is : {{$booking->date}}</li>
  @endforeach
</ul>

</ul>
<h3> <a href="{{route('booking.index')}}"class=" btn btn-secondary">Back</a></h3></div>

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">


@section('js')
    <script> console.log('Hi!'); </script>
@stop
@stop
@stop
@stop

