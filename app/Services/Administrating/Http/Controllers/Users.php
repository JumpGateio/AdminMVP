<?php

namespace App\Services\Administrating\Http\Controllers;

use App\Models\User;
use App\Services\Administrating\Transformers\User as UserTransformer;
use Illuminate\Support\Facades\DB;
use JumpGate\Admin\Http\Controllers\AdminBaseController;
use JumpGate\Users\Models\Role;
use JumpGate\Users\Models\User\Status;
use JumpGate\Users\Services\Registration;

class Users extends AdminBaseController
{
    /**
     * @var \App\Models\User
     */
    protected $model;

    protected $transformer;

    public function __construct(User $model, UserTransformer $transformer)
    {
        $this->setViewLayout('layouts.sidebar');

        $this->model       = $model;
        $this->transformer = $transformer;
    }

    public function create()
    {
        $routes = $this->getRoutes();
        $roles  = $this->getRoleSelect(false);

        $this->setViewData(compact('routes', 'roles'));

        return $this->view();
    }

    public function store()
    {
        // If there is an existing user, redirect them to that user and show an error.
        $existingUser = $this->model->where('email', request('user.email'))->first();

        if (! is_null($existingUser)) {
            return redirect(route($this->routes()['show'], $existingUser->id))
                ->with('error', 'A user with the email ' . request('user.email') . ' already exists.');
        }

        // Generate a new user.
        app(Registration::class)->createUser(request('user'), request('roles'));

        return redirect(route($this->routes()['index']))
            ->with('message', $this->getArea() . ' created.');
    }

    public function edit($id)
    {
        $resource = $this->model->find($id);
        $routes   = $this->getRoutes();
        $roles    = $this->getRoleSelect(false);
        $statuses = $this->getStatusSelect(false);

        $this->setViewData(compact(
            'resource',
            'routes',
            'roles',
            'statuses'
        ));

        return $this->view();
    }

    public function update($id)
    {
        $resource = $this->model->find($id);

        DB::beginTransaction();

        try {
            $resource->update(request('user'));
            $resource->details->update(request('details'));
            $resource->roles()->sync(request('roles'));
        } catch (\Exception $exception) {
            DB::rollback();

            return redirect(route($this->routes()['edit'], $id))
                ->with('error', $exception->getMessage());
        }

        DB::commit();

        return redirect(route($this->routes()['index']))
            ->with('message', $this->getArea() . ' updated.');
    }

    public function block($id, $blockFlag)
    {
        $resource = $this->model->find($id);

        if ($blockFlag) {
            $resource->block();

            return redirect(route($this->routes()['show'], $id))
                ->with('message', $this->getArea() . ' blocked.');
        }

        $resource->unblock();

        return redirect(route($this->routes()['show'], $id))
            ->with('message', $this->getArea() . ' unblocked.');
    }

    public function passwordReset($id)
    {
        $resource = $this->model->find($id);

        $passwordResetToken = $resource->getPasswordResetToken();

        if (! is_null($passwordResetToken)) {
            return redirect(route($this->routes()['show'], $id))
                ->with('error', 'This user already has a password reset in progress.');
        }

        $resource->generatePasswordResetToken();

        return redirect(route($this->routes()['show'], $id))
            ->with('message', 'Password reset emailed to user.');
    }

    public function columns()
    {
        return [
            'Email'  => 'email',
            'Status' => 'status',
        ];
    }

    public function filters()
    {
        return [
            'email'     => [
                'text',
                null,
            ],
            'name'      => [
                'text',
                null,
            ],
            'status_id' => [
                'select',
                $this->getStatusSelect(),
            ],
            'roles'     => [
                'select',
                $this->getRoleSelect(),
            ],
        ];
    }

    /**
     * Get all available routes for the area.
     *
     * @return array
     */
    public function routes()
    {
        return [
            'index'          => 'admin.user.index',
            'show'           => 'admin.user.show',
            'create'         => 'admin.user.create',
            'edit'           => 'admin.user.edit',
            'delete'         => 'admin.user.destroy',
            'reset_password' => 'admin.user.password-reset',
            'block'          => 'admin.user.block',
        ];
    }

    protected function getRoleSelect($prepend = true)
    {
        $roles = Role::pluck('name', 'id');

        if ($prepend) {
            $roles->prepend('All roles', 0);
        }

        return $roles;
    }

    protected function getStatusSelect($prepend = true)
    {
        $statuses = Status::pluck('label', 'id');

        if ($prepend) {
            $statuses->prepend('All statuses', 0);
        }

        return $statuses;
    }
}
