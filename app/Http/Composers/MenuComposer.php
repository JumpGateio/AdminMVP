<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use JumpGate\Menu\DropDown;
use JumpGate\Menu\Link;

class MenuComposer
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
        $this->generateLeftMenu();
        $this->generateRightMenu();
    }

    /**
     * Adds items to the menu that appears on the left side of the main menu.
     */
    private function generateLeftMenu()
    {
        $leftMenu = \Menu::getMenu('leftMenu');

        $leftMenu->link('home', function (Link $link) {
            $link->name = 'Home';
            $link->url  = route('home');
        });
    }

    /**
     * Adds items to the menu that appears on the right side of the main menu.
     */
    private function generateRightMenu()
    {
        $rightMenu = \Menu::getMenu('rightMenu');

        if (auth()->guest()) {
            $rightMenu->link('login', function (Link $link) {
                $link->name = 'Login';
                $link->url  = route('auth.login');
            });
            $rightMenu->link('register', function (Link $link) {
                $link->name = 'Register';
                $link->url  = route('auth.register');
            });

            return true;
        }

        if (auth()->user()->isRole('admin')) {
            $rightMenu->dropdown('admin', 'Admin', function (DropDown $dropDown) {
                $dropDown->link('admin_user', function (Link $link) {
                    $link->name = 'Users';
                    $link->url  = route('admin.user.index');
                });
            });
        }
        $rightMenu->dropdown('user', auth()->user()->display_name, function (DropDown $dropDown) {
            $dropDown->link('user_logout', function (Link $link) {
                $link->name = 'Logout';
                $link->url  = route('auth.logout');
            });
        });
    }
}
