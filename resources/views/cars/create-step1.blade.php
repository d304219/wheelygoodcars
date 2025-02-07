@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Stap 1: Kenteken invoeren</h2>
    <form action="{{ route('cars.create') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="license_plate" class="form-label">Kenteken</label>
            <input type="text" id="license_plate" name="license_plate" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Volgende</button>
    </form>
</div>
@endsection
