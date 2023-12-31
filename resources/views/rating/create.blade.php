@extends('adminlte::page')
@section('title', 'Rating')

@section('content_header')
    <h1>Create Rating  </h1>
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Rating </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <form action="{{ route('rating.store') }}" method="post">
  {{ csrf_field() }}
    <div class="mb-3 mt-3">
      <label for="date">Star</label>
      <input type="text" class="form-control" id="text" placeholder="Enter star" name="star">
    </div>
    <div class="mb-3 mt-3">
      <label for="date">Comment</label>
      <input type="text" class="form-control" id="text" placeholder="Enter comment" name="comment">
    </div>
    <label for="sel1" class="form-label">Select Hotel (select one):</label>
    <select class="form-select" id="sel1" name="hotel_id">
    <option display selected>choose the hotel</option>
    @foreach($hotels as $hotel)
      <option value='{{$hotel->id}}'>{{$hotel->id}}-{{$hotel->name}}</option>
      @endforeach
    </select>
    <label for="sel1" class="form-label">Select Customer (select one):</label>
    <select class="form-select" id="sel1" name="customer_id">
    <option display selected>choose the customer</option>
    @foreach($customers as $customer)
      <option value='{{$customer->id}}'>{{$customer->id}}-{{$customer->name}}</option>
      @endforeach
    </select>
   <br>
    <button type="submit" class="btn btn-primary">Save</button>
    <h3> <a href="{{route('rating.index')}}"class=" btn btn-secondary">Back</a></h3>
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
      
        


 
   



