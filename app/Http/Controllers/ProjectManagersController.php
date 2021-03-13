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
        $resultado = ProjectManager::create($request->all());

        return response()->json(
            ['created' => true,
             'url' => url('/projectmanagers', ['id' => $resultado->id])],
            201,
            ['Location' => route('projectmanagers.read', ['id' => $resultado->id])]
        );
    }

    public function update(Request $request){
        try {
            $project_manager = ProjectManager::findOrFail();
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
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' =>
                ['message' => 'Recurso no encontrado']
            ], 404);
        }
    }
}
