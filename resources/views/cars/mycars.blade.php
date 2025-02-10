@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 fw-bold">Mijn aanbod</h2>
    <div class="table-responsive">
        <table class="table align-middle">
            <tbody>
                @foreach($myCars as $car)
                    <tr class="border-bottom">
                        <td class="text-center" style="width: 100px;">
                            <div style="width: 100px; height: 100px; background-color: #ddd; display: flex; align-items: center; justify-content: center;">
                                100 × 100
                            </div>
                        </td>
                        <td>
                            <h5 class="fw-bold">{{ $car->license_plate }}</h5>
                            @if($car->sold_at)
                                <span class="badge bg-secondary">verkocht</span>
                            @else
                                <span class="badge bg-primary">te koop</span>
                            @endif
                        </td>
                        <td class="fs-5 fw-semibold">€{{ number_format($car->price, 2) }}</td>
                        <td>{{ $car->make }} {{ $car->model }} {{ $car->production_year }}</td>
                        <td>
                            @foreach($car->tags as $tag)
                                <span class="badge bg-light text-dark border border-secondary">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <form action="{{ route('cars.destroy', $car->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze auto wilt verwijderen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
