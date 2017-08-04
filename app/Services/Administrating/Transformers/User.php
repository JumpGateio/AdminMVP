<?php

namespace App\Services\Administrating\Transformers;

use JumpGate\Core\Abstracts\Transformer;

class User extends Transformer
{
    public static function transform($resource)
    {
        return [
            'id'     => $resource->id,
            'email'  => $resource->email,
            'status' => $resource->status->label,
        ];
    }
}
