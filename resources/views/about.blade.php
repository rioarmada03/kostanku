@extends('layouts.main')

@section('container')
<link rel="stylesheet" href="css/style.css">
    <h1>{{ $data['title'] }}</h1>
    <br>
    <p>{!! $data['body'] !!} </p>
@endsection
    



