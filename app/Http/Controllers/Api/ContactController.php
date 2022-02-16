<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request) {
      
      $data = $request->all();

      //validator funziona come request->validate ma non ricarica la pagina; se fallisce restituisce un json con un array di oggetti con gli errori per ogni campo (in un array a loro volta)
      $validator = Validator::make($data,[
        'name' => 'required|min:2|max:255',
        'email' => 'required|max:255',
        'message' => 'required'
      ], [
        'name.required' => 'Il nome è un campo obbligatorio',
        'name.min' => 'Lunghezza minima del nome :min caratteri',
        'name.max' => 'Lunghezza massima del nome :max caratteri',
        'email.required' => 'La mail è un campo obbligatorio',
        'email.max' => 'Lunghezza massima dell\'indirizzo email :max caratteri',
        'message.required' => 'Il testo della mail è un campo obbligatorio'
      ]);

      if($validator->fails()){
        return response()->json([
          'success' => false,
          'errors' => $validator->errors()
        ]);
      }

      return response()->json(['success'=>true]);
    }
}
