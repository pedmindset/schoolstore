<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\User;

/**
 * Class UserTransformer.
 *
 * @package namespace App\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * Transform the User entity.
     *
     * @param \App\Models\User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'email'       => $model->email,
            'profile'       => $model->load('profile'),
            'customer'       => $model->load('customer'),
            'driver'       => $model->load('driver'),
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}