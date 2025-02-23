<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ali Tamer</title>
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
 <script src="{{ asset('public/js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
@extends('layouts.master')
@section('title', 'Prime Numbers')
@section('content')
 <div class="card m-4">
 <div class="card-header">Even Numbers</div>
 <div class="card-body">
 @foreach (range(1, 100) as $i)
 @if($i%2==0)
 <span class="badge bg-primary">{{$i}}</span>
 @else
 <span class="badge bg-secondary">{{$i}}</span>
 @endif
 @endforeach

 </div>
 </div>
@endsection

</body>

</html>
