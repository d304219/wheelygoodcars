<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
                'make' => $car['merk'] ?? '',
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

        Car::create([
            'license_plate' => session('license_plate'),
            'make' => session('make'),
            'model' => session('model'),
            'production_year' => session('production_year'),
            'color' => session('color'),
            'doors' => session('doors'),
            'seats' => session('seats'),
            'weight' => session('weight'),
            'mileage' => $request->mileage,
            'price' => $request->price,
        ]);

        return redirect()->route('cars.create')->with('success', 'Auto toegevoegd!');
    public function myCars()
    {
        $myCars = Auth::user()->cars()->with('tags')->get();
        return view('cars.mycars', compact('myCars'));
    }   
    public function destroy($id)
    {
        $car = Car::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $car->delete();
    
        return redirect()->route('cars.mycars')->with('success', 'Auto verwijderd.');
    }
    
}
