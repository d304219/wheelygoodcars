@extends('layouts.app')

@section('content')
<div class="container max-w-6xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-xl font-bold mb-4">Stap 2: Auto details</h2>
    <form action="{{ route('cars.create.step2', $licensePlate) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-medium">Kenteken</label>
            <input type="text" class="w-full px-4 py-2 border rounded-lg bg-gray-100" value="{{ session('license_plate') }}" readonly>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium">Merk</label>
            <input type="text" class="w-full px-4 py-2 border rounded-lg bg-gray-100" value="{{ session('brand') }}" readonly>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium">Model</label>
            <input type="text" class="w-full px-4 py-2 border rounded-lg bg-gray-100" value="{{ session('model') }}" readonly>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium">Bouwjaar</label>
            <input type="text" class="w-full px-4 py-2 border rounded-lg bg-gray-100" value="{{ session('production_year') }}" readonly>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium">Kleur</label>
            <input type="text" class="w-full px-4 py-2 border rounded-lg bg-gray-100" value="{{ session('color') }}" readonly>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium">Aantal deuren</label>
            <input type="text" class="w-full px-4 py-2 border rounded-lg bg-gray-100" value="{{ session('doors') }}" readonly>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium">Zitplaatsen</label>
            <input type="text" class="w-full px-4 py-2 border rounded-lg bg-gray-100" value="{{ session('seats') }}" readonly>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium">Gewicht</label>
            <input type="text" class="w-full px-4 py-2 border rounded-lg bg-gray-100" value="{{ session('weight') }}" readonly>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium">Kilometerstand</label>
            <input type="number" name="mileage" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium">Vraagprijs</label>
            <input type="text" name="price" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300" required>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Aanbod afronden</button>
    </form>
</div>
@endsection
