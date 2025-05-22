<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PersonaController extends Controller
{
    /**
     * Persona index screen (Where is Skills, Languages, Awards and Links);
     * @return View
     */
    public function __invoke(): View
    {
        return view('persona.edit');
    }
}
