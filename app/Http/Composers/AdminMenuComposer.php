<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use JumpGate\Menu\DropDown;
use JumpGate\Menu\Link;

class AdminMenuComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        if (request()->is('admin/*')) {
            $adminMenu = \Menu::getMenu('adminMenu');

            $adminMenu->dropdown('admin_user', 'Users', function (DropDown $dropDown) {
                $dropDown->link('admin_user_index', function (Link $link) {
                    $link->name = 'Browse Users';
                    $link->url  = route('admin.user.index');
                });
                $dropDown->link('admin_user_create', function (Link $link) {
                    $link->name = 'Create User';
                    $link->url  = route('admin.user.create');
                });
            });

            // $adminMenu->dropdown('admin_role', 'Roles', function (DropDown $dropDown) {
            //     $dropDown->link('admin_role_index', function (Link $link) {
            //         $link->name = 'Browse Roles';
            //         $link->url  = route('admin.user.index');
            //     });
            //     $dropDown->link('admin_role_create', function (Link $link) {
            //         $link->name = 'Create Role';
            //         $link->url  = route('admin.user.create');
            //     });
            // });
        }
    }
}
