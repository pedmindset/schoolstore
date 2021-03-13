<?php

namespace App\Traits;

use Carbon\Carbon;

trait QueryHelperTrait
{
    public static function scopeFilterByDriver($query)
    {
        /** @var \App\Models\User */
        $loggedInUser = auth()->user();
        if ($loggedInUser->hasRole("driver")) {
            return $query->where("driver_id", $loggedInUser->id);
        }
    }

    public static function scopeActive($query)
    {
        $isActive = request()->is_active;

        return $query->when(!empty($isActive), function ($query) use ($isActive) {
            $query->where('is_active', $isActive);
        });
    }

    public static function scopePaged($query)
    {
        $page = request()->page;

        return $query->when(empty($page), function ($query) {
            return $query->get();
        })
            ->when(!empty($page), function ($query) {
                return $query->paginate(25);
            });
    }
}
