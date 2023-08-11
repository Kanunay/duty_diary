@extends('layouts.admin')

@section('content')

<section class="vh bg-gray-100">
    <div class="flex justify-center items-center h-200">
        <div class="w-11/12 lg:w-7/12">
            <div class="card rounded-md">
                <div class="card-body p-4">

                    <div class="mb-4">
                        <h1 class="text-2xl font-semibold mb-2">Create Diary Entry</h1>
                        <form action="{{ route('diaries.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="block">
                                    <label for="supervisor_id" class="block">Supervisor</label>
                                    <select id="supervisor_id" class="form-control" name="supervisor_id">
                                        @if (isset($supervisors))
                                            <option value="" selected disabled>Select Supervisor</option>
                                            @foreach ($supervisors as $supervisor)
                                                <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="block">
                                    <label for="status" class="block">Status</label>
                                    <select id="status" class="form-control" name="status" required>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                <div class="block">
                                    <label for="plan_today" class="block">Plan for Today</label>
                                    <textarea class="form-control" id="plan_today" name="plan_today" required></textarea>
                                </div>
                                <div class="block">
                                    <label for="end_today" class="block">End for Today</label>
                                    <textarea class="form-control" id="end_today" name="end_today" required></textarea>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                <div class="block">
                                    <label for="plan_tomorrow" class="block">Plan for Tomorrow</label>
                                    <textarea class="form-control" id="plan_tomorrow" name="plan_tomorrow" required></textarea>
                                </div>
                                <div class="block">
                                    <label for="roadblocks" class="block">Roadblocks</label>
                                    <textarea class="form-control" id="roadblocks" name="roadblocks" required></textarea>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label for="summary" class="block">Summary</label>
                                <textarea class="form-control" id="summary" name="summary" required></textarea>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('diaries.index') }}" class="btn btn-secondary ml-2">Cancel</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
