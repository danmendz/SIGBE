<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Login del usuario
     */
    public function login(Request $request)
    {
        // Validaciones básicas
        $request->validate([
            'matricula' => 'required|digits:10',
            'password' => 'required|string',
        ]);

        // Buscar usuario
        $user = User::where('matricula', $request->matricula)->first();

        // Verificar credenciales
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Credenciales inválidas'
            ], 401);
        }

        try {
            // Borrar tokens previos si quieres un solo login activo
            $user->tokens()->delete();

            // Crear nuevo token
            $token = $user->createToken('mobile-app')->plainTextToken;

            return response()->json([
                'message' => 'Login exitoso',
                'token' => $token
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al generar el token',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Logout del usuario
     */
    public function logout(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Unauthenticated.'
            ], 401);
        }

        try {
            $user->currentAccessToken()->delete();

            return response()->json([
                'message' => 'Logout exitoso'
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al cerrar sesión',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener datos del usuario autenticado
     */
    public function user(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Unauthenticated.'
            ], 401);
        }

        return response()->json([
            'message' => 'Usuario obtenido exitosamente',
            'user' => [
                'user_id' => $user->id,
                'matricula' => $user->matricula,
                'activo' => $user->activo,
                'email' => $user->email,
                'email_verified_at' => $user->email_verified_at,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
                'rol' => $user->getRoleNames(),
            ]
        ], 200);
    }
}