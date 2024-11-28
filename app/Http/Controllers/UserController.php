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
        $users = DB::table('view_user')->orderBy('first_name','asc')->get();
        $generes = DB::table('genere')->get();
        
         return view('users.index', ['users' => $users, 'generes' => $generes]);
     }

     public function store(Request $request)
     {
         // Validar los datos
         $request->validate([
             'email' => 'required|email|max:60',
             'phone' => 'required|string|max:18',
             'first_name' => 'required|string|max:255',
             'second_name' => 'nullable|string|max:255',
             'first_lastname' => 'required|string|max:255',
             'second_lastname' => 'nullable|string|max:255',
             'city' => 'required|string|max:255',
         ]);
 
         // Crear un nuevo usuario
         $user = User::create([
             'email' => $request->email,
             'phone' => $request->phone,
             'first_name' => $request->first_name,
             'second_name' => $request->second_name,
             'first_lastname' => $request->first_lastname,
             'second_lastname' => $request->second_lastname,
             'city' => $request->city,
             'created_user' => date("Y-m-d H:i:s"),
             'status' => 1,
             'state' => 'active',
         ]);
 
         return response()->json(['success' => true, 'user' => $user]);
     }

     public function destroy($id)
    {
        $item = User::find($id);

        if ($item) {
            $item->delete();
            return response()->json(['success' => true, 'message' => 'Usuario eliminado con éxito']);
        } else {
            return response()->json(['success' => false, 'message' => 'Item not found.'], 404);
        }
    }

    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['error' => 'Usuario no encontrado.'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        // Validar los datos
        $request->validate([
            'email' => 'required|email|max:60',
            'phone' => 'required|string|max:18',
            'first_name' => 'required|string|max:255',
            'second_name' => 'nullable|string|max:255',
            'first_lastname' => 'required|string|max:255',
            'second_lastname' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);
        
        $user = User::findOrFail($id);

        $user -> update([
            'email' => $request->email,
            'phone' => $request->phone,
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'first_lastname' => $request->first_lastname,
            'second_lastname' => $request->second_lastname,
            'city' => $request->city,
        ]);

        return response()->json(['success' => true, 'message' => 'Usuario actualizado con éxito']);
    }

    public function desactive($id)
    {
        $user = User::findOrFail($id);

        $user -> update([
            'status' => 2,
        ]);

        return response()->json(['success' => true, 'message' => 'Usuario desactivado con éxito']);
    }

}
