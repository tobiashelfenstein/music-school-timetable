<?php

use Slim\App;
use App\Application\Actions\Home\ViewHomeAction;
use App\Application\Actions\Login\ViewLoginAction;
use App\Application\Actions\Login\SubmitLoginAction;
use App\Application\Actions\Dashboard\ViewDashboardAction;
use App\Application\Actions\Timetable\ViewTimetableAction;

return function(App $app) {
    $app->get('/', ViewHomeAction::class)->setName('home');
    $app->get('/login', ViewLoginAction::class)->setName('login-page');

    $app->post('/login', SubmitLoginAction::class)->setName('login-submit');

    $app->get('/dashboard', ViewDashboardAction::class)->setName('dashboard');
    $app->get('/timetable', ViewTimetableAction::class)->setName('timetable');
};