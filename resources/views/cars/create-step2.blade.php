@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Stap 2: Auto details</h2>
    <form action="{{ route('cars.create.step2', $licensePlate) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Kenteken</label>
            <input type="text" class="form-control" value="{{ session('license_plate') }}" readonly>
        </div>
        <div class="mb-3">
            <label>Merk</label>
            <input type="text" class="form-control" value="{{ session('make') }}" readonly>
        </div>
        <div class="mb-3">
            <label>Model</label>
            <input type="text" class="form-control" value="{{ session('model') }}" readonly>
        </div>
        <div class="mb-3">
            <label>Bouwjaar</label>
            <input type="text" class="form-control" value="{{ session('production_year') }}" readonly>
        </div>
        <div class="mb-3">
            <label>Kleur</label>
            <input type="text" class="form-control" value="{{ session('color') }}" readonly>
        </div>
        <div class="mb-3">
            <label>Aantal deuren</label>
            <input type="text" class="form-control" value="{{ session('doors') }}" readonly>
        </div>
        <div class="mb-3">
            <label>Zitplaatsen</label>
            <input type="text" class="form-control" value="{{ session('seats') }}" readonly>
        </div>
        <div class="mb-3">
            <label>Gewicht</label>
            <input type="text" class="form-control" value="{{ session('weight') }}" readonly>
        </div>
        <div class="mb-3">
            <label>Kilometerstand</label>
            <input type="number" name="mileage" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Vraagprijs</label>
            <input type="text" name="price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Aanbod afronden</button>
    </form>
</div>
@endsection
