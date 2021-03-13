<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\ProjectManager;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProjectManagersController extends BaseController
{
	public function index(){

		return ProjectManager::all();

	}

	public function read(int $id){
        try {
            return ProjectManager::findOrFail($id);
        } catch(ModelNotFoundException $e) {
            return response()->json([
                'error' =>
                ['message' => 'Recurso no encontrado.']
            ], 404);
        }
	}

    public function create(Request $request){
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:project_managers|max:150'
        ], [
            'first_name.required' => 'El :attribute es requerido.',
            'first_name.required' => 'La longitud de :attribute es muy larga.',
            'last_name.required' => 'El :attribute es requerido.',
            'last_name.required' => 'La longitud de :attribute es muy larga.',
            'email.required' => 'El :attribute es requerido.',
            'email.unique' => 'El :attribute ya se encuentra registrado.',
            'email.max' => 'La longitud de :attribute es muy larga.'
        ]);

        $resultado = ProjectManager::create($request->all());

        return response()->json(
            ['created' => true,
             'url' => url('/projectmanagers', ['id' => $resultado->id])],
            201
        );
    }

    public function update(Request $request){
        try {
            $project_manager = ProjectManager::findOrFail($request->id);

            $project_manager->first_name = $request->first_name;
            $project_manager->last_name = $request->last_name;
            $project_manager->email = $request->email;

            $project_manager->save();

            return response()->json(['project_manager' => $project_manager]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' =>
                ['message' => 'Recurso no encontrado.']
            ], 404);
        }
    }

    public function delete(int $id){
        try {
            ProjectManager::destroy($id);

            return response()->json([
                'message' => 'Project Manager eleminado correctamente.',
            ], 204);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' =>
                ['message' => 'Recurso no encontrado']
            ], 404);
        }
    }
}
