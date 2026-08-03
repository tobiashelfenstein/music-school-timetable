<?php

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use App\Application\Actions\Home\ViewHomeAction;
use App\Application\Actions\Login\ViewLoginAction;
use App\Application\Actions\Login\SubmitLoginAction;
use App\Application\Actions\Dashboard\ViewDashboardAction;
use App\Application\Actions\Timetable\ViewTimetableAction;
use App\Application\Actions\Timetable\EditTimetableAction;

return function(App $app) {
    $app->get('/', ViewHomeAction::class)->setName('home');
    $app->get('/login', ViewLoginAction::class)->setName('login-page');

    $app->post('/login', SubmitLoginAction::class)->setName('login-submit');

    $app->get('/dashboard', ViewDashboardAction::class)->setName('dashboard');

    $app->group('/timetable', function(Group $group) {
        $group->get('', ViewTimetableAction::class)->setName('timetable');
        $group->get('/unit/{id:\d+}/edit', EditTimetableAction::class)->setName('timetable-unit-edit');
        $group->get('/unit/{id:\d+}/delete', EditTimetableAction::class)->setName('timetable-unit-delete');
    });
};