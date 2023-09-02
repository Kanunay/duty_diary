@extends('layouts.admin')
<head>
    <style>
        .becontent {
            margin-left: 10px;
        }
    </style>
</head>

@section('content')
<div class="container">
    <div class="">
        <img src="{{ asset("cdl-logo.png") }}" alt="CDL Logo" width="30%">
        <p class="text-uppercase bg-primary mt-1 text-light">Practicum Duty Diary</p>
        <p class="text-left p-0 card-body ">Trainee Name : {{ auth()->user()->name }}</p>
        <p class="text-left p-0 card-body border-bottom">Compoany Name : CREATIVEDEVLABS (CDL INNOVATIVE IT SOLUTIONS)</p>
     
        <p class="text-left p  card-body">Plan for today :</p>
        <div class="text-left card-body border-bottom">{!! $diary->plan_today !!}</div>
 
        <p class="text-left pt-1 card-body">End for Today :</p>
        <div class="text-left card-body border-bottom">{!! $diary->end_today !!}</div>
        
        <p class="text-left pt-1 card-body">Plan for Tomorrow :</p>
        <div class="text-left card-body border-bottom">{!! $diary->plan_tomorrow !!}</div>
        
        <p class="text-left pt-1 card-body">Roadblocks :</p>
        <div class="text-left card-body border-bottom">{!! $diary->roadblocks !!}</div>
        
        <p class="text-left pt-1 card-body ">Summary :</p>
        <div class="text-left card-body border-bottom">{!! $diary->summary !!}</div>
        <p class="text-left m-0 p-0">Signature here</p>
        <p class="text-left m-0 p-0">Supervisor Name : {{ $diary->supervisor->name }}</p>
        <p class="text-left m-0 p-0">Status: <span class="{{ $diary->status === 1 ? 'text-warning' : 'text-success' }}">{{ $diary->status === 1 ? 'Pending' : 'Approved' }}</span></p>
        <p class="text-left m-0 pb-5">Date : {{ $diary->created_at->format('M d, Y') }}</p>
    </div>
</div>

@endsection
