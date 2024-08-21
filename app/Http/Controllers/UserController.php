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
             'num_document' => 'required|int|max:255',
             'first_name' => 'required|string|max:255',
             'second_name' => 'nullable|string|max:255',
             'first_lastname' => 'required|string|max:255',
             'second_lastname' => 'nullable|string|max:255',
             'genere' => 'required|int|max:10',
             'date_birth' => 'required|date',
             'city' => 'required|string|max:255',
             'update_user' => 'required|date',
         ]);
 
         // Crear un nuevo usuario
         $user = User::create([
             'user_name' => $request->user_name,
             'email' => $request->email,
             'num_document' => $request->num_document,
             'first_name' => $request->first_name,
             'second_name' => $request->second_name,
             'first_lastname' => $request->first_lastname,
             'second_lastname' => $request->second_lastname,
             'genere' => $request->genere,
             'date_birth' => $request->date_birth,
             'city' => $request->city,
             'update_user' => Carbon::now(),
         ]);
 
         // Devolver una respuesta JSON
         return response()->json(['success' => true, 'user' => $user]);
     }
 
    //  // Mostrar un usuario específico
    //  public function show($id)
    //  {
    //      $user = User::find($id);
    //      return response()->json($user); // Devuelve el usuario como JSON para AJAX
    //  }
 
    //  // Crear un nuevo usuario
    //  public function store(Request $request)
    //  {
    //      $validator = Validator::make($request->all(), [
    //          'name' => 'required|string|max:255',
    //          'email' => 'required|string|email|max:255|unique:users',
    //          'password' => 'required|string|min:8',
    //      ]);
 
    //      if ($validator->fails()) {
    //          return response()->json(['errors' => $validator->errors()], 422);
    //      }
 
    //      $user = User::create([
    //          'name' => $request->name,
    //          'email' => $request->email,
    //          'password' => Hash::make($request->password),
    //      ]);
 
    //      return response()->json($user); // Devuelve el usuario recién creado como JSON
    //  }
 
    //  // Actualizar un usuario existente
    //  public function update(Request $request, $id)
    //  {
    //      $validator = Validator::make($request->all(), [
    //          'name' => 'required|string|max:255',
    //          'email' => 'required|string|email|max:255|unique:users,email,' . $id,
    //          'password' => 'nullable|string|min:8',
    //      ]);
 
    //      if ($validator->fails()) {
    //          return response()->json(['errors' => $validator->errors()], 422);
    //      }
 
    //      $user = User::find($id);
 
    //      if (!$user) {
    //          return response()->json(['error' => 'User not found'], 404);
    //      }
 
    //      $user->name = $request->name;
    //      $user->email = $request->email;
 
    //      if ($request->password) {
    //          $user->password = Hash::make($request->password);
    //      }
 
    //      $user->save();
 
    //      return response()->json($user); // Devuelve el usuario actualizado como JSON
    //  }
 
    //  // Eliminar un usuario
    //  public function destroy($id)
    //  {
    //      $user = User::find($id);
 
    //      if (!$user) {
    //          return response()->json(['error' => 'User not found'], 404);
    //      }
 
    //      $user->delete();
 
    //      return response()->json(['success' => 'User deleted successfully']); // Devuelve un mensaje de éxito como JSON
    //  }
}
