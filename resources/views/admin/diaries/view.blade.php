@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="bg-white p-6 rounded-lg shadow-md p-3">
        <h2 class="text-left pt-1 ">Supervisor Name : {{ $diary->supervisor->name }}</h2>
        
        <h2 class="text-left pt-1">EOD REPORT User : {{ auth()->user()->name }}</h2>

        <h2 class="text-left pt-1">Plan for today :</h2>
        <p class="text-left">{{ $diary->plan_today }}</p>
        
        <h2 class="text-left pt-1">End for Today :</h2>
        <p class="text-left">{{ $diary->end_today }}</p>
        
        <h2 class="text-left pt-1">Plan for Tomorrow :</h2>
        <p class="text-left">{{ $diary->plan_tomorrow }}</p>
        
        <h2 class="text-left pt-1">Roadblocks :</h2>
        <p class="text-left">{{ $diary->roadblocks }}</p>
        
        <h2 class="text-left pt-1">Summary :</h2>
        <p class="text-left">{{ $diary->summary }}</p>
        
        <h2 class="text-left pt-1">Status : {{ $diary->status === 2 ? 'Pending' : 'Approved' }}</h2>
        
        <h2 class="text-left pt-1">Created At : {{ $diary->created_at->format('M d, Y') }}</h2>
    </div>
</div>

@endsection
