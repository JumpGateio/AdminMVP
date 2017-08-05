<?php

namespace App\Services\Administrating\Http\Controllers;

use App\Models\User;
use App\Services\Administrating\Transformers\User as UserTransformer;
use JumpGate\Admin\Http\Controllers\AdminBaseController;
use JumpGate\Users\Models\Role;
use JumpGate\Users\Models\User\Status;

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
                Status::pluck('label', 'id')->prepend('All statuses', 0),
            ],
            'roles'      => [
                'select',
                Role::pluck('name', 'id')->prepend('All roles', 0),
            ],
        ];
    }
}
