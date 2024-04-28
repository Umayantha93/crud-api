<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{

    public function index()
    {
        $persons = Person::all();

        return $persons;
    }

    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'phone_number' => 'required'
        ]);

        $person = Person::create($validatedData);

        return response()->json($person, 201);
    }

    public function show($id)
    {
        $person = Person::findOrFail($id);

        return response()->json($person);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'phone_number' => 'required'
        ]);

        $person = Person::findOrFail($id);
        $person->update($validatedData);
        return response()->json($person, 200);
    }

    public function destroy($id)
    {
        $person = Person::findOrFail($id);
        $person->delete();
        return response()->json("deleted", 204);
    }
}



