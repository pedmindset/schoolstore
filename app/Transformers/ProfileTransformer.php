<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Profile;

/**
 * Class ProfileTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProfileTransformer extends TransformerAbstract
{
    /**
     * Transform the Profile entity.
     *
     * @param \App\Models\Profile $model
     *
     * @return array
     */
    public function transform(Profile $model)
    {
        return [
            'id'         => (int) $model->id,
            'user'       => $model->load('user'),
            'name'       => $model->name,
            'email'      => $model->email,
            'phone'      => $model->phone,
            'phone2'     => $model->phone2,
            'address'    => $model->address,
            'address2'   => $model->address2,
            'date_of_birth' => $model->date_of_birth,
            'postcode'   => $model->postcode,
            'city'       => $model->city,
            'region'     => $model->region,
            'country'    => $model->country,
            'lat'        => $model->lat,
            'lng'        => $model->lng,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
