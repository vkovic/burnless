<?php

namespace App\Http\Controllers;

use App\Channels\AbstractModule;
use App\Channels\Web\ScoreModule;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class WebModuleController extends Controller
{
    public function dayData()
    {
        return [
            [
                'url' => '/modules/quote',
                'module' => 'QuoteModule',
                'type' => null,
                'score' => null,
            ],
            [
                'url' => 'ScoreModule',
                'score' => null,
                'type' => null,
            ]
        ];
    }

    public function get($module)
    {
        $moduleClass =  'App\\Channels\\Web\\' . ucfirst($module) . 'Module';

        /** @var AbstractModule $moduleObject */
        $moduleObject = new $moduleClass;
        $view = $moduleObject->getPopupView();

        return $view;
    }

    public function submit($module)
    {
        $score = request()->get('score');

        $moduleClass =  'App\\Channels\\Web\\' . ucfirst($module) . 'Module';
        /** @var AbstractModule $moduleObject */
        $moduleObject = new $moduleClass;
        $moduleObject->handlePopupSubmit($moduleClass, $score);
    }
}
