<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/users', function (Request $request) {
    $query = User::query();

    if ($request->filled('pesquisa')) {
        $query->where('firstname', "like", "%{$request->get('pesquisa')}%");
    }
    return $query->get();
});

Route::get('/users/{id}', function (Request $request, $id) {
    $user = User::findOrFail($id);

    return response()->json($user, 200);
});



Route::post('/users', function (Request $request) {
    $request->validate([
        "firstname" => "required",
        "lastname" => "required",
        "email" => "required|unique:users",
        "password" => "required"
    ], [
        "firstname.required" => "Nome é obrigatório",
        "lastname.required" => "Sobrenome é obrigatório",
        "email.required" => "E-mail é obrigatório",
        "email.unique" => "E-mail precisa ser único",
        "password.required" => "A senha é obrigatória",

    ]);
    $userData = $request->all();
    $user = User::create($userData);
    return response()->json($user, 200);
});

Route::put('/users/{id}', function (Request $request, string $id) {
    $request->validate([
        "firstname" => "required",
        "lastname" => "required",
        "email" => "required",
        "password" => "required"
    ], [
        "firstname.required" => "Nome é obrigatório",
        "lastname.required" => "Sobrenome é obrigatório",
        "email.required" => "E-mail é obrigatório",
        "password.required" => "A senha é obrigatória",

    ]);

    $user = User::findOrFail($id);
    $user->update($request->all()); // Corrigido aqui
    return response()->json($user, 200);
});

Route::delete('/users/{id}', function (Request $request, string $id) {

    $user = User::findOrFail($id);
    $user = $user::delete();
    return response()->json([], 204);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
