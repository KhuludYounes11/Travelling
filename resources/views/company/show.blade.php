
@extends('adminlte::page')
@section('title', 'Company')

@section('content_header')
    <h1>Show Company</h1>
@section('content')<!DOCTYPE html>
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
  <li class="list-group-item">Name is : {{$company->name}}</li>
  <li class="list-group-item">Phone is : {{$company->phone}}</li>
</ul>
<h3> <a href="{{route('company.index')}}"class=" btn btn-secondary">Back</a></h3></div>
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@section('js')
    <script> console.log('Hi!'); </script>
@stop
@stop
@stop
@stop