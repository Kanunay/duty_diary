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
    <div class="bg-white p-6 rounded-lg shadow-md p-3 card">
        <h3 class="text-left pt-1 card-header">Supervisor Name : {{ $diary->supervisor->name }}</h3>
        
        <h3 class="text-left pt-1 card-body mt-3">EOD REPORT User : {{ auth()->user()->name }}</h3>

        <h3 class="text-left pt-1 card-body">Plan for today :</h3>
        <div class="text-left card-body">{!! $diary->plan_today !!}</div>
 
        <h3 class="text-left pt-1 card-body">End for Today :</h3>
        <div class="text-left card-body">{!! $diary->end_today !!}</div>
        
        <h3 class="text-left pt-1 card-body">Plan for Tomorrow :</h3>
        <div class="text-left card-body">{!! $diary->plan_tomorrow !!}</div>
        
        <h3 class="text-left pt-1 card-body">Roadblocks :</h3>
        <div class="text-left card-body">{!! $diary->roadblocks !!}</div>
        
        <h3 class="text-left pt-1 card-body">Summary :</h3>
        <div class="text-left card-body">{!! $diary->summary !!}</div>
        
        <h3 class="text-left pt-1 card-body">Status: <span class="{{ $diary->status === 1 ? 'text-warning' : 'text-success' }}">{{ $diary->status === 1 ? 'Pending' : 'Approved' }}</span></h3>
        
        <h3 class="text-left pt-1 card-footer">Created At : {{ $diary->created_at->format('M d, Y') }}</h3>
    </div>
</div>

@endsection
