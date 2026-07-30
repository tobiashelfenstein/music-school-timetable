<?php

use Slim\App;

return function(App $app) {
    $app->get('/', \App\Module\Home\Action\HomePageAction::class)->setName('home');
    $app->get('/login', \App\Module\Login\Action\LoginPageAction::class)->setName('login-page');

    $app->post('/login', \App\Module\Login\Action\LoginSubmitAction::class)->setName('login-submit');

    $app->get('/dashboard', \App\Module\Dashboard\Action\DashboardPageAction::class)->setName('dashboard');
    $app->get('/timetable', \App\Module\Timetable\ListPage\Action\TimetableListPageAction::class)->setName('timetable');
};