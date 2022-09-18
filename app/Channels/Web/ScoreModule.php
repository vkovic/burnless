<?php

namespace App\Channels\Web;

use App\Channels\AbstractModule;
use Inertia\Inertia;

class ScoreModule extends AbstractModule
{
    public function getPopupView()
    {
        return Inertia::render('ScoreModule');
    }
}
