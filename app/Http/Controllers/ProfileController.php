<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entidad;

class ProfileController extends Controller
{
    public function historic()
    {
        $breadcrumbs = $this->generateBreadcumb();
        $entidad = auth()->user()->entidad();
        $encargados = $entidad->encargados();

        return view('admin.profile.historic', compact('breadcrumbs', 'entidad'));
    }

    public function historicJSON($entidadId)
    {
        $entidad = Entidad::find($entidadId);
        $encargados = [];

        foreach ($entidad->encargados as $encargado) {
            if ($encargado->getRoleNames()->contains(config('global.rolenames.admin-entidad'))) {
                $encargadoArr = $encargado->toArray();
                $encargadoArr['created_at'] = date_format(date_create($encargadoArr['created_at']), 'd/m/Y');

                if ($encargadoArr['entidad_user']['activo'] != 1) {
                    $encargadoArr['updated_at'] = date_format(date_create($encargadoArr['updated_at']), 'd/m/Y');
                } else {
                    $encargadoArr['updated_at'] = '';
                }

                $encargados[] = $encargadoArr;
            }
        }

        return response()->json($encargados);
    }

    public function profile()
    {
        return view('profile.profile');
    }

    public function changePassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $newPassword = $request->input('new_password');
            $newPasswordRepeated = $request->input('new_password_repeated');

            if (strcmp($newPassword, $newPasswordRepeated) != 0) {
                return redirect()->route('admin.profile.change-password')->with('danger', 'Las contraseñas no coinciden.');
            }

            auth()->user()->update(['password' => $newPassword]);
            return redirect()->route('home')->with('success', 'Contraseña actualizada satisfactoriamente.');
        }

        return view('profile.password');
    }

    private function generateBreadcumb()
    {
        return [
            (object) ['url' => route('admin.profile.historic'), 'title' => 'Historico'],
        ];
    }
}
