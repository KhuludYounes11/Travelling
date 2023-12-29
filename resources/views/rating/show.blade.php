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
@foreach($rating as $rating)
  <h2>Show Rating {{$rating->id}} </h2>
  <ul class="list-group">
  <li class="list-group-item">CustomerId is : {{$rating->customer_id}}</li>
  <li class="list-group-item">Star is : {{$rating->star}}</li>
  <li class="list-group-item">HotelId is : {{$rating->hotel_id}}</li>
  <li class="list-group-item">Comment is : {{$rating->comment}}</li>
  @endforeach
</ul>
<h3> <a href="{{route('rating.index')}}"class=" btn btn-secondary">Back</a></h3></div>