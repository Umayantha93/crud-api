<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        $item = Person::create($validatedData);

        return response()->json($item, 201);
    }


}


