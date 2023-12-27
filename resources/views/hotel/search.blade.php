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
  <h2>Show hotel </h2>
  @foreach ($hotel as $hotel)
  <ul class="list-group">
  <li class="list-group-item">Name is : {{$hotel->name}}</li>
  <li class="list-group-item">Phone is : {{$hotel->phone}}</li>
  <li class="list-group-item">City is : {{$hotel->city->name}}</li>
  <li class="list-group-item">
    <a  href="{{route('hotel.show',[$hotel->id])}}" class="btn btn-danger">Show</a>
    <a  href="{{route('hotel.edit',[$hotel->id])}}" class="btn btn-success">Edit</a>
    <a  href="{{route('hotel.delete',[$hotel->id])}}" class="btn btn-secondary">Delete</a>
  </li>
</ul>
<br/>
@endforeach
<h3> <a href="{{route('hotel.index')}}"class=" btn btn-secondary">Back</a></h3></div>