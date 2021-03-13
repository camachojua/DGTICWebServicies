<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\ProjectManager;

class ProjectManagersController extends BaseController
{
	public function index(){

		return ProjectManager::all();

	}

	public function read($id){

		return ProjectManager::findOrFail($id);
	}
}
