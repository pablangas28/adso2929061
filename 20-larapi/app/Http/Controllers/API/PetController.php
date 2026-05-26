<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    public function index(){
        $pets = Pet::all();
        return response()->json([
            'message' => '✅ Query succes!',
            'pets'    => $pets
        ], 200);
    }
    public function show(Request $request){
        $pet = Pet::where('id', $request->id)->first();
        return response()->json([
            'message' => '✅ Query succes!',
            'pets'    => $pet
        ], 200);
    }
    public function store(Request $request)
    {
        try {
            $validation = $request->validate([
                'name' => ['required', 'string'],
                'kind' => ['required', 'string'],
                'weight' => ['required', 'numeric'],
                'age' => ['required', 'numeric'],
                'breed' => ['required', 'string'],
                'location' => ['required', 'string'],
                'description' => ['required', 'string']
            ]);

            if ($validation) {
                $image = 'images/pets/no-photo.jpg';
                $pet = new Pet;
                $pet->name = $request->name;
                $pet->kind = $request->kind;
                $pet->weight = $request->weight;
                $pet->age = $request->age;
                $pet->breed = $request->breed;
                $pet->location = $request->location;
                $pet->description = $request->description;
                $pet->image = $image;
                $pet->active = true;
                $pet->status = true;

                if ($pet->save()) {
                    return response()->json([
                        'message' => '✅Mascota creada exitosamente!',
                        'pet' => $pet
                    ], 201);
                }
            }

        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
    public function update(Request $request)
    {
        try {
            $pet = Pet::find($request->id);
            $validation = $request->validate([
                'name' => ['sometimes','required', 'string'],
                'kind' => ['sometimes','required', 'string'],
                'weight' => ['sometimes','required', 'numeric'],
                'age' => ['sometimes','required', 'numeric'],
                'breed' => ['sometimes','required', 'string'],
                'location' => ['sometimes','required', 'string'],
                'description' => ['sometimes','required', 'string']
            ]);
            if ($validation && $pet) {
                $pet->update($request->all());
                return response()->json([
                    'message' => '✅Mascota actualizada exitosamente!',
                    'pet' => $pet
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }
    }
    public function destroy(Request $request)
    {
        try {
            $pet = Pet::find($request->id);
            if ($pet->delete()) {
                return response()->json([
                    'message' => '✅Mascota eliminada exitosamente!',
                    'pet' => $pet
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], 400);
        }

    }
}
