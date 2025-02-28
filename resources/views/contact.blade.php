@extends('layouts.main')

@section('container')
<link rel="stylesheet" href="css/style.css">

<h1>{!! $contact['title'] !!}</h1>
<br>
<p>Email : {{ $contact['email'] }}</p>
<p>Telepon : {{ $contact['telepon'] }}</p>
<p>Instagram : {{ $contact['instagram'] }}</p>
<p>Whatsapp : {{ $contact['whatsapp'] }}</p>

@endsection

</html>