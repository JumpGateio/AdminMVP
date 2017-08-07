<?php

namespace App\Services\Administrating\Http\Routes;

use JumpGate\Core\Contracts\Routes;
use JumpGate\Core\Http\Routes\BaseRoute;
use Illuminate\Routing\Router;

class Users extends BaseRoute implements Routes
{
    public $namespace = 'App\Services\Administrating\Http\Controllers';

    public $prefix = 'admin/user';

    public $middleware = ['web', 'acl', 'auth'];

    public $role = 'admin';

    public function routes(Router $router)
    {
        $router->get('create')
               ->name('admin.user.create')
               ->uses('Users@create')
               ->middleware('active:admin_user');

        $router->post('create')
               ->name('admin.user.create')
               ->uses('Users@store')
               ->middleware('active:admin_user');

        $router->get('edit/{id}')
               ->name('admin.user.edit')
               ->uses('Users@edit')
               ->middleware('active:admin_user');

        $router->post('edit/{id}')
               ->name('admin.user.edit')
               ->uses('Users@update')
               ->middleware('active:admin_user');

        $router->delete('{id}')
               ->name('admin.user.destroy')
               ->uses('Users@destroy')
               ->middleware('active:admin_user');

        $router->get('block/{id}/{block}')
               ->name('admin.user.block')
               ->uses('Users@block')
               ->middleware('active:admin_user');

        $router->get('password-reset/{id}')
               ->name('admin.user.password-reset')
               ->uses('Users@passwordReset')
               ->middleware('active:admin_user');

        $router->get('{id}')
               ->name('admin.user.show')
               ->uses('Users@show')
               ->middleware('active:admin_user');

        $router->any('/')
               ->name('admin.user.index')
               ->uses('Users@index')
               ->middleware('active:admin_user');
    }
}
