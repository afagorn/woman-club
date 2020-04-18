<?php

use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator as Crumbs;
//Macros
Breadcrumbs::macro('resource', function ($name, $title, $site = 'site') {
    $home = 'home';
    switch ($site) {
        case 'admin':
            $name = 'admin.'.$name;
            $home = 'admin.'.$home;
            break;
    }

    Breadcrumbs::register($name.'.index', function (Crumbs $crubms) use ($name, $title, $home) {
        $crubms->parent($home);
        $crubms->push($title, route($name.'.index'));
    });

    Breadcrumbs::register($name.'.create', function (Crumbs $crubms) use ($name, $title) {
        $crubms->parent($name.'.index');
        $crubms->push('Создать', route($name.'.create'));
    });

    Breadcrumbs::register($name.'.show', function (Crumbs $crubms, $model) use ($name, $title) {
        $crubms->parent($name.'.index');
        $crubms->push($model->name, route($name.'.show', $model->slug));
    });

    Breadcrumbs::register($name.'.edit', function (Crumbs $crubms, $model) use ($name, $title) {
        $crubms->parent($name.'.show', $model);
        $crubms->push('Редактировать', route($name.'.edit', $model->slug));
    });
});

//Site
Breadcrumbs::register('home', function (Crumbs $crumbs) {
    $crumbs->push('Главная', route('home'));
});

//Admin
Breadcrumbs::register('admin.home', function (Crumbs $crumbs) {
    $crumbs->push('Главная', route('admin.home'));
});

Breadcrumbs::resource('products', 'Продукты', 'admin');
