<?php

namespace App\Channels;

use App\Models\Score;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

abstract class AbstractModule
{
    protected $isDbModule = false;
    protected $multiplier = 1;

    /**
     * Handle incoming popup data
     *
     * @param array $data
     */
    public function handlePopupSubmit($module, $score)
    {
        Score::create([
            'session_id' => Session::getId(),
            'module' => $module,
            'type' => $this->getType(),
            'score' => $score * $this->multiplier,
        ]);
    }

    public function getType()
    {
        return null;
    }

    /**
     * Get Inertia view to render popup
     * @return mixed
     */
    // TODO: return type
    abstract public function getPopupView();
}
