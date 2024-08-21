<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{
     // Mostrar la lista de usuarios
     public function index()
     {
        $users = DB::table('view_user')->get();
        $generes = DB::table('genere')->get();
        
         return view('users.index', ['users' => $users, 'generes' => $generes]);
     }

     public function store(Request $request)
     {
         // Validar los datos
         $request->validate([
             'user_name' => 'required|string|max:30',
             'email' => 'required|email|max:60',
             'num_document' => 'required|string|max:18',
             'phone' => 'required|string|max:18',
             'first_name' => 'required|string|max:255',
             'second_name' => 'nullable|string|max:255',
             'first_lastname' => 'required|string|max:255',
             'second_lastname' => 'nullable|string|max:255',
             'genere' => 'required|int|max:10',
             'date_birth' => 'required|date',
             'city' => 'required|string|max:255',
         ]);
 
         // Crear un nuevo usuario
         $user = User::create([
             'user_name' => $request->user_name,
             'email' => $request->email,
             'num_document' => $request->num_document,
             'phone' => $request->phone,
             'first_name' => $request->first_name,
             'second_name' => $request->second_name,
             'first_lastname' => $request->first_lastname,
             'second_lastname' => $request->second_lastname,
             'genere' => $request->genere,
             'date_birth' => $request->date_birth,
             'city' => $request->city,
             'created_user' => date("Y-m-d H:i:s"),
             'status' => 1,
         ]);
 
         // Devolver una respuesta JSON
         return response()->json(['success' => true, 'user' => $user]);
     }
 
}
