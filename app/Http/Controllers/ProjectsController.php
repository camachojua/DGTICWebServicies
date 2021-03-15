<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProjectsController extends BaseController
{
    public function index() {
        return Project::all();
    }

    public function read(int $id) {
        try {
            return Project::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(
                ['error' =>
                 ['message' => 'Recurso no encontrado',
                 'detail' => $e]],
                404);
        }
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:projects|max:255',
            'manager_id' => 'required'
        ], [
            'name' => 'El :attribute es requerido.',
            'manager_id' => 'El :attribute es requerido.'
        ]);

        $resultado = Project::create($request->all());

        return response()->json(
            ['created' => true,
             'url' => url('/projectmanagers', ['id' => $resultado->id])],
            201
        );
    }

    public function update(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:projects|max:255',
            'manager_id' => 'required'
        ], [
            'name' => 'El :attribute es requerido.',
            'manager_id' => 'El :attribute es requerido.'
        ]);

        try {
            $project = Project::findOrFail($request->id);

            $project->name = $request->name;
            $project->manager_id = $request->manager_id;
            $project->save();

            return response()->json([
                'message' => 'Proyecto actualizado.',
                'proyecto' => $project]
                                    , 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => ['message' => 'Error al actualizar el proyecto.']],
                                    404);
        }
    }

    public function delete(int $id) {
        try {
            Project::destroy($id);

            return response()->json([
                'message' => 'Project eleminado correctamente.',
            ], 204);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => ['message' => 'Recurso no encontrado.'], 404]);
        }
    }
}
