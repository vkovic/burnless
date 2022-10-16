<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Support\Facades\Session;

class ModuleController extends Controller
{
    public function submit($module)
    {
        Score::create([
            'session_id' => Session::getId(),
            'type' => request()->get('type'),
            'module' => 'Score',
            'score' => request()->get('score'),
        ]);

        return redirect()->route('thanks');
    }
}
