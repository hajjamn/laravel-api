<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {

        $results = Project::all();

        /* $results = Project::with('type', 'technologies')->paginate(4); */

        return response()->json([
            /* 'projects' => $projects */
            'results' => $results
        ]);

    }
}
