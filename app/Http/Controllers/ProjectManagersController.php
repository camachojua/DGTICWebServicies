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

	public function read($id){
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
        return ProjectManager::create($request->all());
    }

    public function update(){
        return true;
    }

    public function delete(){
        return true;
    }
}
