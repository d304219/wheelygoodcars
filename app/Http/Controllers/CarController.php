<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;

class CarController extends Controller
{
    public function createStep1()
    {
        return view('cars.create-step1');
    }

    public function storeStep1(Request $request)
    {
        $request->validate([
            'license_plate' => 'required|unique:cars,license_plate',
        ]);

        // RDW API-call
        $response = Http::get("https://opendata.rdw.nl/resource/m9d7-ebf2.json?kenteken=" . strtoupper(str_replace('-', '', $request->license_plate)));
        $carData = $response->json();

        if (!empty($carData)) {
            $car = $carData[0]; 

            session([
                'license_plate' => strtoupper($request->license_plate),
                'brand' => $car['merk'] ?? '',
                'model' => $car['handelsbenaming'] ?? '',
                'production_year' => substr($car['datum_eerste_toelating'] ?? '', 0, 4),
                'color' => $car['eerste_kleur'] ?? '',
                'doors' => $car['aantal_deuren'] ?? '',
                'seats' => $car['aantal_zitplaatsen'] ?? '',
                'weight' => $car['massa_rijklaar'] ?? '',
            ]);

            return redirect()->route('cars.create.step2', $request->license_plate);
        }

        return back()->withErrors(['license_plate' => 'Ongeldig kenteken.']);
    }

    public function createStep2($licensePlate)
    {
        return view('cars.create-step2', compact('licensePlate'));
    }

    public function storeStep2(Request $request, $licensePlate)
    {
        $request->validate([
            'mileage' => 'required|integer',
            'price' => 'required|numeric',
        ]);
    
        // Debug: Check alle sessiegegevens
        // dd(session()->all());
    
        // Auto opslaan met sessiegegevens
        $car = Car::create([
            'user_id' => Auth::id(),
            'license_plate' => session('license_plate'),
            'brand' => session('brand'),
            'model' => session('model'),
            'production_year' => session('production_year'),
            'color' => session('color'),
            'doors' => (int) session('doors'),
            'seats' => (int) session('seats'),
            'weight' => (int) session('weight'),
            'mileage' => $request->mileage,
            'price' => $request->price,
        ]);
        
    
        return redirect()->route('cars.mycars')->with('success', 'Auto toegevoegd!');
    }
    
    public function myCars()
    {
        $myCars = Auth::user()->cars()->with('tags')->get();
        return view('cars.mycars', compact('myCars'));
    }
    
    public function home()
    {
        // Haal unieke waarden op voor de dropdowns
    }
    public function searchResults(Request $request)
    {
        // Begin met een query voor alle auto's
        $query = Car::query();
    

        // Filters toepassen op basis van de zoekopdracht
        if ($request->has('brand') && $request->brand != '') {
            $query->where('brand', $request->brand);
        }
        if ($request->has('model') && $request->model != '') {
            $query->where('model', $request->model);
        }
        if ($request->has('min_mileage') && $request->min_mileage != '') {
            $query->where('mileage', '>=', $request->min_mileage);
        }
        if ($request->has('max_mileage') && $request->max_mileage != '') {
            $query->where('mileage', '<=', $request->max_mileage);
        }
        if ($request->has('min_year') && $request->min_year != '') {
            $query->where('production_year', '>=', $request->min_year);
        }
        if ($request->has('max_year') && $request->max_year != '') {
            $query->where('production_year', '<=', $request->max_year);
        }
        if ($request->has('min_price') && $request->min_price != '') {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && $request->max_price != '') {
            $query->where('price', '<=', $request->max_price);
        }

        // Pagineer de resultaten
        $cars = $query->paginate(12);
        $totalCars = $query->count();

        return view('cars.search-results', compact('cars', 'totalCars'));
    }
    public function destroy($id)
    {
        $car = Car::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $car->delete();
    
        return redirect()->route('cars.mycars')->with('success', 'Auto verwijderd.');
    }
    
}
