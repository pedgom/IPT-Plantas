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
    $trail->push($model->id, route('altura-atributos.show', $model));
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




//**************************************************************************************
//RESISTENCIA     ************************************************************************
//**************************************************************************************
Breadcrumbs::for('resistencia-atributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Resistencia'), route('resistencia-atributos.index'));
});
Breadcrumbs::for('resistencia-atributos.create', function ($trail) {
    $trail->parent('resistencia-atributos.index');
    $trail->push(__('Create'), route('resistencia-atributos.create'));
});
Breadcrumbs::for('resistencia-atributos.show', function ($trail, $model) {
    $trail->parent('resistencia-atributos.index');
    $trail->push($model->planta_id, route('resistencia-atributos.show', $model));
});
Breadcrumbs::for('resistencia-atributos.edit', function ($trail, $model) {
    $trail->parent('resistencia-atributos.show', $model);
    $trail->push(__('Update'), route('resistencia-atributos.edit', $model));
});


Breadcrumbs::for('resistencia-atributo-plantas.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Resistencia'), route('resistencia-atributo-plantas.index'));
});
Breadcrumbs::for('resistencia-atributo-plantas.create', function ($trail) {
    $trail->parent('resistencia-atributos.index');
    $trail->push(__('Create'), route('resistencia-atributo-plantas.create'));
});
Breadcrumbs::for('resistencia-atributo-plantas.show', function ($trail, $model) {
    $trail->parent('resistencia-atributo-plantas.index');
    $trail->push($model->planta_id, route('resistencia-atributo-plantas.show', $model));
});
Breadcrumbs::for('resistencia-atributo-plantas.edit', function ($trail, $model) {
    $trail->parent('resistencia-atributo-plantas', $model);
    $trail->push(__('Update'), route('resistencia-atributo-plantas.edit', $model));
});




//**************************************************************************************
//SOLO          ************************************************************************
//**************************************************************************************
Breadcrumbs::for('solo-atributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Solo'), route('solo-atributos.index'));
});
Breadcrumbs::for('solo-atributos.create', function ($trail) {
    $trail->parent('solo-atributos.index');
    $trail->push(__('Create'), route('solo-atributos.create'));
});
Breadcrumbs::for('solo-atributos.show', function ($trail, $model) {
    $trail->parent('solo-atributos.index');
    $trail->push($model->planta_id, route('solo-atributos.show', $model));
});
Breadcrumbs::for('solo-atributos.edit', function ($trail, $model) {
    $trail->parent('solo-atributos.show', $model);
    $trail->push(__('Update'), route('solo-atributos.edit', $model));
});


Breadcrumbs::for('solo-atributo-plantas.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Solo'), route('solo-atributo-plantas.index'));
});
Breadcrumbs::for('solo-atributo-plantas.create', function ($trail) {
    $trail->parent('solo-atributos.index');
    $trail->push(__('Create'), route('solo-atributo-plantas.create'));
});
Breadcrumbs::for('solo-atributo-plantas.show', function ($trail, $model) {
    $trail->parent('solo-atributo-plantas.index');
    $trail->push($model->planta_id, route('solo-atributo-plantas.show', $model));
});
Breadcrumbs::for('solo-atributo-plantas.edit', function ($trail, $model) {
    $trail->parent('solo-atributo-plantas', $model);
    $trail->push(__('Update'), route('solo-atributo-plantas.edit', $model));
});



//**************************************************************************************
//PH_SOLO          ************************************************************************
//**************************************************************************************
Breadcrumbs::for('ph-solo-atributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Ph_Solo'), route('ph-solo-atributos.index'));
});
Breadcrumbs::for('ph-solo-atributos.create', function ($trail) {
    $trail->parent('ph-solo-atributos.index');
    $trail->push(__('Create'), route('ph-solo-atributos.create'));
});
Breadcrumbs::for('ph-solo-atributos.show', function ($trail, $model) {
    $trail->parent('ph-solo-atributos.index');
    $trail->push($model->planta_id, route('ph-solo-atributos.show', $model));
});
Breadcrumbs::for('ph-solo-atributos.edit', function ($trail, $model) {
    $trail->parent('ph-solo-atributos.show', $model);
    $trail->push(__('Update'), route('ph-solo-atributos.edit', $model));
});


Breadcrumbs::for('ph-solo-atributo-plantas.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Ph_Solo'), route('ph-solo-atributo-plantas.index'));
});
Breadcrumbs::for('ph-solo-atributo-plantas.create', function ($trail) {
    $trail->parent('ph-solo-atributos.index');
    $trail->push(__('Create'), route('ph-solo-atributo-plantas.create'));
});
Breadcrumbs::for('ph-solo-atributo-plantas.show', function ($trail, $model) {
    $trail->parent('ph-solo-atributo-plantas.index');
    $trail->push($model->planta_id, route('ph-solo-atributo-plantas.show', $model));
});
Breadcrumbs::for('ph-solo-atributo-plantas.edit', function ($trail, $model) {
    $trail->parent('ph-solo-atributo-plantas', $model);
    $trail->push(__('Update'), route('ph-solo-atributo-plantas.edit', $model));
});








//**************************************************************************************
//Estacao          ************************************************************************
//**************************************************************************************
Breadcrumbs::for('estacao-atributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Estacao'), route('estacao-atributos.index'));
});
Breadcrumbs::for('estacao-atributos.create', function ($trail) {
    $trail->parent('estacao-atributos.index');
    $trail->push(__('Create'), route('estacao-atributos.create'));
});
Breadcrumbs::for('estacao-atributos.show', function ($trail, $model) {
    $trail->parent('estacao-atributos.index');
    $trail->push($model->planta_id, route('estacao-atributos.show', $model));
});
Breadcrumbs::for('estacao-atributos.edit', function ($trail, $model) {
    $trail->parent('estacao-atributos.show', $model);
    $trail->push(__('Update'), route('estacao-atributos.edit', $model));
});


Breadcrumbs::for('estacao-atributo-plantas.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Estacao'), route('estacao-atributo-plantas.index'));
});
Breadcrumbs::for('estacao-atributo-plantas.create', function ($trail) {
    $trail->parent('estacao-atributos.index');
    $trail->push(__('Create'), route('estacao-atributo-plantas.create'));
});
Breadcrumbs::for('estacao-atributo-plantas.show', function ($trail, $model) {
    $trail->parent('estacao-atributo-plantas.index');
    $trail->push($model->planta_id, route('estacao-atributo-plantas.show', $model));
});
Breadcrumbs::for('estacao-atributo-plantas.edit', function ($trail, $model) {
    $trail->parent('estacao-atributo-plantas', $model);
    $trail->push(__('Update'), route('estacao-atributo-plantas.edit', $model));
});




//**************************************************************************************
//Cor          ************************************************************************
//**************************************************************************************
Breadcrumbs::for('corSinteseAtributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Cor'), route('corSinteseAtributos.index'));
});
Breadcrumbs::for('corSinteseAtributos.create', function ($trail) {
    $trail->parent('corSinteseAtributos.index');
    $trail->push(__('Create'), route('corSinteseAtributos.create'));
});
Breadcrumbs::for('corSinteseAtributos.show', function ($trail, $model) {
    $trail->parent('corSinteseAtributos.index');
    $trail->push($model->planta_id, route('corSinteseAtributos.show', $model));
});
Breadcrumbs::for('corSinteseAtributos.edit', function ($trail, $model) {
    $trail->parent('corSinteseAtributos.show', $model);
    $trail->push(__('Update'), route('corSinteseAtributos.edit', $model));
});


//**************************************************************************************
//Familia          ************************************************************************
//**************************************************************************************
Breadcrumbs::for('familiaAtributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Familia'), route('familiaAtributos.index'));
});
Breadcrumbs::for('familiaAtributos.create', function ($trail) {
    $trail->parent('familiaAtributos.index');
    $trail->push(__('Create'), route('familiaAtributos.create'));
});
Breadcrumbs::for('familiaAtributos.show', function ($trail, $model) {
    $trail->parent('familiaAtributos.index');
    $trail->push($model->familia, route('familiaAtributos.show', $model));
});
Breadcrumbs::for('familiaAtributos.edit', function ($trail, $model) {
    $trail->parent('familiaAtributos.show', $model);
    $trail->push(__('Update'), route('familiaAtributos.edit', $model));
});


//**************************************************************************************
//Forma Arbusto          ************************************************************************
//**************************************************************************************
Breadcrumbs::for('formaArbustoAtributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Forma_Arbusto'), route('formaArbustoAtributos.index'));
});
Breadcrumbs::for('formaArbustoAtributos.create', function ($trail) {
    $trail->parent('formaArbustoAtributos.index');
    $trail->push(__('Create'), route('formaArbustoAtributos.create'));
});
Breadcrumbs::for('formaArbustoAtributos.show', function ($trail, $model) {
    $trail->parent('formaArbustoAtributos.index');
    $trail->push($model->forma_arbusto, route('formaArbustoAtributos.show', $model));
});
Breadcrumbs::for('formaArbustoAtributos.edit', function ($trail, $model) {
    $trail->parent('formaArbustoAtributos.show', $model);
    $trail->push(__('Update'), route('formaArbustoAtributos.edit', $model));
});



//**************************************************************************************
//Forma Arvore          ************************************************************************
//**************************************************************************************
Breadcrumbs::for('formaArvoreAtributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Forma_Arvore'), route('formaArvoreAtributos.index'));
});
Breadcrumbs::for('formaArvoreAtributos.create', function ($trail) {
    $trail->parent('formaArvoreAtributos.index');
    $trail->push(__('Create'), route('formaArvoreAtributos.create'));
});
Breadcrumbs::for('formaArvoreAtributos.show', function ($trail, $model) {
    $trail->parent('formaArvoreAtributos.index');
    $trail->push($model->forma_arvore, route('formaArvoreAtributos.show', $model));
});
Breadcrumbs::for('formaArvoreAtributos.edit', function ($trail, $model) {
    $trail->parent('formaArvoreAtributos.show', $model);
    $trail->push(__('Update'), route('formaArvoreAtributos.edit', $model));
});


//**************************************************************************************
//Forma Herbacea          ************************************************************************
//**************************************************************************************
Breadcrumbs::for('formaHerbaceaAtributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Forma_Herbacea'), route('formaHerbaceaAtributos.index'));
});
Breadcrumbs::for('formaHerbaceaAtributos.create', function ($trail) {
    $trail->parent('formaHerbaceaAtributos.index');
    $trail->push(__('Create'), route('formaHerbaceaAtributos.create'));
});
Breadcrumbs::for('formaHerbaceaAtributos.show', function ($trail, $model) {
    $trail->parent('formaHerbaceaAtributos.index');
    $trail->push($model->forma_herbacea, route('formaHerbaceaAtributos.show', $model));
});
Breadcrumbs::for('formaHerbaceaAtributos.edit', function ($trail, $model) {
    $trail->parent('formaHerbaceaAtributos.show', $model);
    $trail->push(__('Update'), route('formaHerbaceaAtributos.edit', $model));
});



//**************************************************************************************
//Genero         ************************************************************************
//**************************************************************************************
Breadcrumbs::for('generoAtributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Genero'), route('generoAtributos.index'));
});
Breadcrumbs::for('generoAtributos.create', function ($trail) {
    $trail->parent('generoAtributos.index');
    $trail->push(__('Create'), route('generoAtributos.create'));
});
Breadcrumbs::for('generoAtributos.show', function ($trail, $model) {
    $trail->parent('generoAtributos.index');
    $trail->push($model->genero, route('generoAtributos.show', $model));
});
Breadcrumbs::for('generoAtributos.edit', function ($trail, $model) {
    $trail->parent('generoAtributos.show', $model);
    $trail->push(__('Update'), route('generoAtributos.edit', $model));
});



//**************************************************************************************
//Ordem         ************************************************************************
//**************************************************************************************
Breadcrumbs::for('ordemAtributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Ordem'), route('ordemAtributos.index'));
});
Breadcrumbs::for('ordemAtributos.create', function ($trail) {
    $trail->parent('ordemAtributos.index');
    $trail->push(__('Create'), route('ordemAtributos.create'));
});
Breadcrumbs::for('ordemAtributos.show', function ($trail, $model) {
    $trail->parent('ordemAtributos.index');
    $trail->push($model->ordem, route('ordemAtributos.show', $model));
});
Breadcrumbs::for('ordemAtributos.edit', function ($trail, $model) {
    $trail->parent('ordemAtributos.show', $model);
    $trail->push(__('Update'), route('ordemAtributos.edit', $model));
});


//**************************************************************************************
//Origem Relacao         ************************************************************************
//**************************************************************************************
Breadcrumbs::for('origemRelacaoAtributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Origem Relação'), route('origemRelacaoAtributos.index'));
});
Breadcrumbs::for('origemRelacaoAtributos.create', function ($trail) {
    $trail->parent('origemRelacaoAtributos.index');
    $trail->push(__('Create'), route('origemRelacaoAtributos.create'));
});
Breadcrumbs::for('origemRelacaoAtributos.show', function ($trail, $model) {
    $trail->parent('origemRelacaoAtributos.index');
    $trail->push($model->origem_relacao, route('origemRelacaoAtributos.show', $model));
});
Breadcrumbs::for('origemRelacaoAtributos.edit', function ($trail, $model) {
    $trail->parent('origemRelacaoAtributos.show', $model);
    $trail->push(__('Update'), route('origemRelacaoAtributos.edit', $model));
});


//**************************************************************************************
//Persistencia        ************************************************************************
//**************************************************************************************
Breadcrumbs::for('persistenciaAtributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Persistencia'), route('persistenciaAtributos.index'));
});
Breadcrumbs::for('persistenciaAtributos.create', function ($trail) {
    $trail->parent('persistenciaAtributos.index');
    $trail->push(__('Create'), route('persistenciaAtributos.create'));
});
Breadcrumbs::for('persistenciaAtributos.show', function ($trail, $model) {
    $trail->parent('persistenciaAtributos.index');
    $trail->push($model->planta_id, route('persistenciaAtributos.show', $model));
});
Breadcrumbs::for('persistenciaAtributos.edit', function ($trail, $model) {
    $trail->parent('persistenciaAtributos.show', $model);
    $trail->push(__('Update'), route('persistenciaAtributos.edit', $model));
});


//**************************************************************************************
//Situaçao Ecologica        ************************************************************************
//**************************************************************************************
Breadcrumbs::for('situacaoEcologicaAtributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Situacao Ecologica'), route('situacaoEcologicaAtributos.index'));
});
Breadcrumbs::for('situacaoEcologicaAtributos.create', function ($trail) {
    $trail->parent('situacaoEcologicaAtributos.index');
    $trail->push(__('Create'), route('situacaoEcologicaAtributos.create'));
});
Breadcrumbs::for('situacaoEcologicaAtributos.show', function ($trail, $model) {
    $trail->parent('situacaoEcologicaAtributos.index');
    $trail->push($model->situacao_ecologica, route('situacaoEcologicaAtributos.show', $model));
});
Breadcrumbs::for('situacaoEcologicaAtributos.edit', function ($trail, $model) {
    $trail->parent('situacaoEcologicaAtributos.show', $model);
    $trail->push(__('Update'), route('situacaoEcologicaAtributos.edit', $model));
});


//**************************************************************************************
//Uso        ************************************************************************
//**************************************************************************************
Breadcrumbs::for('usoAtributos.index', function ($trail) {
    $trail->parent('home');
    $trail->push(__('Uso'), route('usoAtributos.index'));
});
Breadcrumbs::for('usoAtributos.create', function ($trail) {
    $trail->parent('usoAtributos.index');
    $trail->push(__('Create'), route('usoAtributos.create'));
});
Breadcrumbs::for('usoAtributos.show', function ($trail, $model) {
    $trail->parent('usoAtributos.index');
    $trail->push($model->uso, route('usoAtributos.show', $model));
});
Breadcrumbs::for('usoAtributos.edit', function ($trail, $model) {
    $trail->parent('usoAtributos.show', $model);
    $trail->push(__('Update'), route('usoAtributos.edit', $model));
});
