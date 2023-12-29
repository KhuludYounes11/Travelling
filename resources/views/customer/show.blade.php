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
@foreach($customer as $customer)
  <h2>Show Customer {{$customer->id}} </h2>
  <div class="media">
  <div class="media-left">
    <img src="https://th.bing.com/th?id=OIP.pegfGc8sWHh2_RuwiuAknwHaHZ&w=120&h=120&c=7&qlt=90&o=6&pid=MultiSMRSV2Source" class="media-object" style="width:60px"><br>
  </div>
  <div class="media-body">
    <h4 class="media-heading"> {{$customer->name}}</h4>
    <p>Email is :{{$customer->email}}</p>
    <p>Phone is : {{$customer->phone}}</p>
    <p>Gender is : {{$customer->gender}}</p>
    @foreach($customer->bookings as $booking)
    <p>Info Booking is :date is {{$booking->date}},ticket:{{$booking->ticket_id}},hotel:{{$booking->hotel->name}}</p>
    @endforeach
    @foreach($customer->ratings as $rating)
    <p> Info Rating is : star is{{$rating->star}}for hotel:{{$rating->hotel->name}},comment:{{$rating->comment}}</p>
    @endforeach

  @endforeach

<h3> <a href="{{route('customer.index')}}"class=" btn btn-secondary">Back</a></h3></div>