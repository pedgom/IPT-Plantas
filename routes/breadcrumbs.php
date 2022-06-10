<?php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(__('Home'), route('home'), ['isHome' => true]);
});

// Home > User
Breadcrumbs::for('users.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Users'), route('users.index'));
});
Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users.index');
    $trail->push(__('Create'), route('users.create'));
});
Breadcrumbs::for('users.show', function ($trail, $user) {
    $trail->parent('users.index');
    $trail->push($user->name, route('users.show', $user));
});
Breadcrumbs::for('users.edit', function ($trail, $user) {
    $trail->parent('users.show', $user);
    $trail->push(__('Update'), route('users.edit', $user));
});
Breadcrumbs::for('users.own_show', function ($trail, $user) {
    $trail->parent('home');
    $trail->push($user->name, route('users.show', $user));
});
Breadcrumbs::for('users.own_edit', function ($trail, $user) {
    $trail->parent('users.own_show', $user);
    $trail->push(__('Update'), route('users.edit', $user));
});

// Home > Role
Breadcrumbs::for('roles.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Roles'), route('roles.index'));
});
Breadcrumbs::for('roles.create', function ($trail) {
    $trail->parent('roles.index');
    $trail->push(__('Create'), route('roles.create'));
});
Breadcrumbs::for('roles.show', function ($trail, $model) {
    $trail->parent('roles.index');
    $trail->push($model->name, route('roles.show', $model));
});
Breadcrumbs::for('roles.edit', function ($trail, $model) {
    $trail->parent('roles.show', $model);
    $trail->push(__('Update'), route('roles.edit', $model));
});

// Home > Settings
Breadcrumbs::for('settings.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Settings'), route('settings.index'));
});
Breadcrumbs::for('settings.create', function ($trail) {
    $trail->parent('settings.index');
    $trail->push(__('Create'), route('settings.create'));
});
Breadcrumbs::for('settings.show', function ($trail, $model) {
    $trail->parent('settings.index');
    $trail->push($model->name, route('settings.show', $model));
});
Breadcrumbs::for('settings.edit', function ($trail, $model) {
    $trail->parent('settings.show', $model);
    $trail->push(__('Update'), route('settings.edit', $model));
});

// Home > Permissions
Breadcrumbs::for('permissions.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Permissions'), route('permissions.index'));
});
Breadcrumbs::for('permissions.create', function ($trail) {
    $trail->parent('permissions.index');
    $trail->push(__('Create'), route('permissions.create'));
});
Breadcrumbs::for('permissions.show', function ($trail, $model) {
    $trail->parent('permissions.index');
    $trail->push($model->name, route('permissions.show', $model));
});
Breadcrumbs::for('permissions.edit', function ($trail, $model) {
    $trail->parent('permissions.show', $model);
    $trail->push(__('Update'), route('permissions.edit', $model));
});

// Home > Demo
Breadcrumbs::for('demos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Demos'), route('demos.index'));
});
Breadcrumbs::for('demos.create', function ($trail) {
    $trail->parent('demos.index');
    $trail->push(__('Create'), route('demos.create'));
});
Breadcrumbs::for('demos.show', function ($trail, $model) {
    $trail->parent('demos.index');
    $trail->push($model->name, route('demos.show', $model));
});
Breadcrumbs::for('demos.edit', function ($trail, $model) {
    $trail->parent('demos.show', $model);
    $trail->push(__('Update'), route('demos.edit', $model));
});


// Home > Plantas
Breadcrumbs::for('plantas.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Plantas'), route('plantas.index'));
});
Breadcrumbs::for('plantas.create', function ($trail) {
    $trail->parent('plantas.index');
    $trail->push(__('Create'), route('plantas.create'));
});
Breadcrumbs::for('plantas.show', function ($trail, $model) {
    $trail->parent('plantas.index');
    $trail->push($model->nome_botanico, route('plantas.show', $model));
});
Breadcrumbs::for('plantas.edit', function ($trail, $model) {
    $trail->parent('plantas.show', $model);
    $trail->push(__('Update'), route('plantas.edit', $model));
});


//**************************************************************************************
//ALTURAS       ************************************************************************
//**************************************************************************************
Breadcrumbs::for('altura-atributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Altura'), route('altura-atributos.index'));
});
Breadcrumbs::for('altura-atributos.create', function ($trail) {
    $trail->parent('altura-atributos.index');
    $trail->push(__('Create'), route('altura-atributos.create'));
});
Breadcrumbs::for('altura-atributos.show', function ($trail, $model) {
    $trail->parent('altura-atributos.index');
    $trail->push($model->planta_id, route('altura-atributos.show', $model));
});
Breadcrumbs::for('altura-atributos.edit', function ($trail, $model) {
    $trail->parent('altura-atributos.show', $model);
    $trail->push(__('Update'), route('altura-atributos.edit', $model));
});


Breadcrumbs::for('altura-atributo-plantas.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Alturas'), route('altura-atributo-plantas.index'));
});
Breadcrumbs::for('altura-atributo-plantas.create', function ($trail) {
    $trail->parent('altura-atributos.index');
    $trail->push(__('Create'), route('altura-atributo-plantas.create'));
});
Breadcrumbs::for('altura-atributo-plantas.show', function ($trail, $model) {
    $trail->parent('altura-atributo-plantas.index');
    $trail->push($model->planta_id, route('altura-atributo-plantas.show', $model));
});
Breadcrumbs::for('altura-atributo-plantas.edit', function ($trail, $model) {
    $trail->parent('altura-atributo-plantas', $model);
    $trail->push(__('Update'), route('altura-atributo-plantas.edit', $model));
});






//**************************************************************************************
//CATEGORIAS       *********************************************************************
//**************************************************************************************
Breadcrumbs::for('categoria-atributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Categorias'), route('categoria-atributos.index'));
});
Breadcrumbs::for('categoria-atributos.create', function ($trail) {
    $trail->parent('categoria-atributos.index');
    $trail->push(__('Create'), route('categoria-atributos.create'));
});
Breadcrumbs::for('categoria-atributos.show', function ($trail, $model) {
    $trail->parent('categoria-atributos.index');
    $trail->push($model->planta_id, route('categoria-atributos.show', $model));
});
Breadcrumbs::for('categoria-atributos.edit', function ($trail, $model) {
    $trail->parent('categoria-atributos.show', $model);
    $trail->push(__('Update'), route('categoria-atributos.edit', $model));
});


Breadcrumbs::for('categoria-atributo-plantas.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Categorias'), route('categoria-atributo-plantas.index'));
});
Breadcrumbs::for('categoria-atributo-plantas.create', function ($trail) {
    $trail->parent('categoria-atributos.index');
    $trail->push(__('Create'), route('categoria-atributo-plantas.create'));
});
Breadcrumbs::for('categoria-atributo-plantas.show', function ($trail, $model) {
    $trail->parent('categoria-atributo-plantas.index');
    $trail->push($model->planta_id, route('categoria-atributo-plantas.show', $model));
});
Breadcrumbs::for('categoria-atributo-plantas.edit', function ($trail, $model) {
    $trail->parent('categoria-atributo-plantas', $model);
    $trail->push(__('Update'), route('categoria-atributo-plantas.edit', $model));
});






//**************************************************************************************
//LUZ           ************************************************************************
//**************************************************************************************
Breadcrumbs::for('luz-atributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Luz'), route('luz-atributos.index'));
});
Breadcrumbs::for('luz-atributos.create', function ($trail) {
    $trail->parent('luz-atributos.index');
    $trail->push(__('Create'), route('luz-atributos.create'));
});
Breadcrumbs::for('luz-atributos.show', function ($trail, $model) {
    $trail->parent('luz-atributos.index');
    $trail->push($model->planta_id, route('luz-atributos.show', $model));
});
Breadcrumbs::for('luz-atributos.edit', function ($trail, $model) {
    $trail->parent('luz-atributos.show', $model);
    $trail->push(__('Update'), route('luz-atributos.edit', $model));
});


Breadcrumbs::for('luz-atributo-plantas.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Luz'), route('luz-atributo-plantas.index'));
});
Breadcrumbs::for('luz-atributo-plantas.create', function ($trail) {
    $trail->parent('luz-atributos.index');
    $trail->push(__('Create'), route('luz-atributo-plantas.create'));
});
Breadcrumbs::for('luz-atributo-plantas.show', function ($trail, $model) {
    $trail->parent('luz-atributo-plantas.index');
    $trail->push($model->planta_id, route('luz-atributo-plantas.show', $model));
});
Breadcrumbs::for('luz-atributo-plantas.edit', function ($trail, $model) {
    $trail->parent('luz-atributo-plantas', $model);
    $trail->push(__('Update'), route('luz-atributo-plantas.edit', $model));
});






//**************************************************************************************
//DIAMETRO      ************************************************************************
//**************************************************************************************
Breadcrumbs::for('diametro-atributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Diametro'), route('diametro-atributos.index'));
});
Breadcrumbs::for('diametro-atributos.create', function ($trail) {
    $trail->parent('diametro-atributos.index');
    $trail->push(__('Create'), route('diametro-atributos.create'));
});
Breadcrumbs::for('diametro-atributos.show', function ($trail, $model) {
    $trail->parent('diametro-atributos.index');
    $trail->push($model->planta_id, route('diametro-atributos.show', $model));
});
Breadcrumbs::for('diametro-atributos.edit', function ($trail, $model) {
    $trail->parent('diametro-atributos.show', $model);
    $trail->push(__('Update'), route('diametro-atributos.edit', $model));
});


Breadcrumbs::for('diametro-atributo-plantas.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Diametro'), route('diametro-atributo-plantas.index'));
});
Breadcrumbs::for('diametro-atributo-plantas.create', function ($trail) {
    $trail->parent('diametro-atributos.index');
    $trail->push(__('Create'), route('diametro-atributo-plantas.create'));
});
Breadcrumbs::for('diametro-atributo-plantas.show', function ($trail, $model) {
    $trail->parent('diametro-atributo-plantas.index');
    $trail->push($model->planta_id, route('diametro-atributo-plantas.show', $model));
});
Breadcrumbs::for('diametro-atributo-plantas.edit', function ($trail, $model) {
    $trail->parent('diametro-atributo-plantas', $model);
    $trail->push(__('Update'), route('diametro-atributo-plantas.edit', $model));
});






//**************************************************************************************
//DENSIDADE     ************************************************************************
//**************************************************************************************
Breadcrumbs::for('densidade-atributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Densidade'), route('densidade-atributos.index'));
});
Breadcrumbs::for('densidade-atributos.create', function ($trail) {
    $trail->parent('densidade-atributos.index');
    $trail->push(__('Create'), route('densidade-atributos.create'));
});
Breadcrumbs::for('densidade-atributos.show', function ($trail, $model) {
    $trail->parent('densidade-atributos.index');
    $trail->push($model->planta_id, route('densidade-atributos.show', $model));
});
Breadcrumbs::for('densidade-atributos.edit', function ($trail, $model) {
    $trail->parent('densidade-atributos.show', $model);
    $trail->push(__('Update'), route('densidade-atributos.edit', $model));
});


Breadcrumbs::for('densidade-atributo-plantas.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Densidade'), route('densidade-atributo-plantas.index'));
});
Breadcrumbs::for('densidade-atributo-plantas.create', function ($trail) {
    $trail->parent('densidade-atributos.index');
    $trail->push(__('Create'), route('densidade-atributo-plantas.create'));
});
Breadcrumbs::for('densidade-atributo-plantas.show', function ($trail, $model) {
    $trail->parent('densidade-atributo-plantas.index');
    $trail->push($model->planta_id, route('densidade-atributo-plantas.show', $model));
});
Breadcrumbs::for('densidade-atributo-plantas.edit', function ($trail, $model) {
    $trail->parent('densidade-atributo-plantas', $model);
    $trail->push(__('Update'), route('densidade-atributo-plantas.edit', $model));
});




//**************************************************************************************
//AGUA     ************************************************************************
//**************************************************************************************
Breadcrumbs::for('agua-atributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Agua'), route('agua-atributos.index'));
});
Breadcrumbs::for('agua-atributos.create', function ($trail) {
    $trail->parent('agua-atributos.index');
    $trail->push(__('Create'), route('agua-atributos.create'));
});
Breadcrumbs::for('agua-atributos.show', function ($trail, $model) {
    $trail->parent('agua-atributos.index');
    $trail->push($model->planta_id, route('agua-atributos.show', $model));
});
Breadcrumbs::for('agua-atributos.edit', function ($trail, $model) {
    $trail->parent('agua-atributos.show', $model);
    $trail->push(__('Update'), route('agua-atributos.edit', $model));
});


Breadcrumbs::for('agua-atributo-plantas.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Agua'), route('agua-atributo-plantas.index'));
});
Breadcrumbs::for('agua-atributo-plantas.create', function ($trail) {
    $trail->parent('agua-atributos.index');
    $trail->push(__('Create'), route('agua-atributo-plantas.create'));
});
Breadcrumbs::for('agua-atributo-plantas.show', function ($trail, $model) {
    $trail->parent('agua-atributo-plantas.index');
    $trail->push($model->planta_id, route('agua-atributo-plantas.show', $model));
});
Breadcrumbs::for('agua-atributo-plantas.edit', function ($trail, $model) {
    $trail->parent('agua-atributo-plantas', $model);
    $trail->push(__('Update'), route('agua-atributo-plantas.edit', $model));
});
