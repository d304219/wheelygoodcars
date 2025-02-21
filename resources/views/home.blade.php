@extends('layouts.app')
@section('content')

    <div class=" mx-auto py-10 text-center">
        <h1 class="text-4xl font-bold">Zoek en vergelijk</h1>
        <h2 class="text-2xl">op 40+ autosites tegelijk</h2>
    </div>
    <div class="mx-auto max-w-7xl bg-white text-black p-6 rounded-lg shadow-md">
        <h3 class="text-xl font-bold text-blue-600 mb-4">NL aanbod</h3>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <select class="border p-2 rounded"> <option>Merk...</option> </select>
            <select class="border p-2 rounded"> <option>Model...</option> </select>
            <div class="flex gap-2">
                <span class="font-bold">Km.stand</span>
                <input type="number" placeholder="Min" class="border p-2 rounded w-24">
                <input type="number" placeholder="Max" class="border p-2 rounded w-24">
            </div>
            <div class="flex gap-2">
                <span class="font-bold">Bouwjaar</span>
                <input type="number" placeholder="Min" class="border p-2 rounded w-24">
                <input type="number" placeholder="Max" class="border p-2 rounded w-24">
            </div>
            <div class="flex gap-2">
                <span class="font-bold">Prijs</span>
                <input type="number" placeholder="Min" class="border p-2 rounded w-24">
                <input type="number" placeholder="Max" class="border p-2 rounded w-24">
            </div>
            <select class="border p-2 rounded"> <option>Brandstof...</option> </select>
            <select class="border p-2 rounded"> <option>Transmissie...</option> </select>
            <select class="border p-2 rounded"> <option>Carrosserie...</option> </select>
        </div>
        <div class="mt-4 flex justify-between items-center">
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Wis</button>
            <button class="bg-orange-500 text-white px-6 py-3 rounded font-bold">Vinden (332.574)</button>
        </div>
    </div>

    @endsection
