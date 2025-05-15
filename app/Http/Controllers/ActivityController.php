<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ActivityController extends Controller
{
    /**
     * Handle the incoming request. And return a view to edit Employments, Education, Certifications and Projects.
     * @return View
     */
    public function __invoke(): View
    {
        return view('activities.edit');
    }
}
