@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to Fly Zone & Travel company</p>
    <center>
        <td> <a  href="{{ route('customer.index')}}" class="btn btn-success">Add New Bookig</a></td>
    </center>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop