@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-xl font-semibold mb-4">{{ $diary->supervisor->name }}</h1>
        <p class="mb-4">{{ $diary->plan_today }}</p>
        
        <h1 class="text-xl font-semibold mb-4">End for Today</h1>
        <p class="mb-4">{{ $diary->end_today }}</p>
        
        <h1 class="text-xl font-semibold mb-4">Plan for Tomorrow</h1>
        <p class="mb-4">{{ $diary->plan_tomorrow }}</p>
        
        <h1 class="text-xl font-semibold mb-4">Roadblocks</h1>
        <p class="mb-4">{{ $diary->roadblocks }}</p>
        
        <h1 class="text-xl font-semibold mb-4">Summary</h1>
        <p class="mb-4">{{ $diary->summary }}</p>
        
        <h1 class="text-xl font-semibold mb-4">Status</h1>
        <p class="mb-4">{{ $diary->status === 1 ? 'Active' : 'Inactive' }}</p>
        
        <h1 class="text-xl font-semibold mb-4">Created At</h1>
        <p class="mb-4">{{ $diary->created_at->format('M d, Y') }}</p>
    </div>
</div>
@endsection
