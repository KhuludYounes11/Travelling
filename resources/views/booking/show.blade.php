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
  <li class="list-group-item">CustomerId is : {{$booking->customer_id}}</li>
  <li class="list-group-item">TicketId is : {{$booking->ticket_id}}</li>
  <li class="list-group-item">HotelId is : {{$booking->hotel_id}}</li>
  <li class="list-group-item">Date is : {{$booking->date}}</li>
  @endforeach
</ul>
<h3> <a href="{{route('booking.index')}}"class=" btn btn-secondary">Back</a></h3></div>