@extends('adminlte::page')
@section('title', 'Hotel')

@section('content_header')
    <h1> Show Hotel </h1>
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
  <div class="media">
  <div class="media-left">
    <img src="https://th.bing.com/th?id=OIP.v7RKLXI0oEjeOCNk3B-hkwHaEK&w=333&h=187&c=8&rs=1&qlt=90&o=6&pid=3.1&rm=2" class="media-object" style="width:100px height:100px"><br>

  <div class="media-body">
    <h4 class="media-heading"> {{$hotel->name}}</h4>
    <p>Phone is : {{$hotel->phone}}</p>
    <p>City is : {{$hotel->city->name}}</p>
    <p><h5>Average Rating is : {{$average}}</h5></p>
    <h3> <a href="{{route('hotel.index')}}"class=" btn btn-secondary">Back</a></h3></div>  </div>
    @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@section('js')
    <script> console.log('Hi!'); </script>
@stop
@stop
@stop
@stop