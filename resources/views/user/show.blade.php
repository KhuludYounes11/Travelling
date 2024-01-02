@extends('adminlte::page')
@section('title', 'User')

@section('content_header')
    <h1>Show User </h1>
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
@foreach($user as $user)
  <div class="media">
  <div class="media-left">
    <img src="https://th.bing.com/th?id=OIP.pegfGc8sWHh2_RuwiuAknwHaHZ&w=120&h=120&c=7&qlt=90&o=6&pid=MultiSMRSV2Source" class="media-object" style="width:100px height:100px"><br>
  <div class="media-body">
    <h4 class="media-heading">{{$user->name}}</h4>
    <p>Email is : {{$user->email}}</p>
    <p>Role is : {{$user->role}}</p>
  @endforeach
 <h3> <a href="{{route('home')}}"class=" btn btn-secondary">Back</a></h3></div>
</div></div>
</div>
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@section('js')
    <script> console.log('Hi!'); </script>
@stop
@stop
@stop
@stop