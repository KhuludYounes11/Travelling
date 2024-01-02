@extends('adminlte::page')
@section('title', 'City')

@section('content_header')
    <h1> Show City</h1>
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
  <ul class="list-group">
  <li class="list-group-item">City is : {{$city->name}}</li>
  <li class="list-group-item">Country is : {{$city->country}}</li>
</ul>
<br/>   
<h3> <a href="{{route('city.index')}}"class=" btn btn-secondary">Back</a></h3></div>
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">


@section('js')
    <script> console.log('Hi!'); </script>
@stop
@stop
@stop
@stop