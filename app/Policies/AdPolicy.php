<?php

namespace App\Policies;

use App\User;
use App\Ad;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update or delete the ad.
     *
     * @param  \App\User $user
     * @param  \App\Ad $ad
     * @return mixed
     */
    public function updateAd(User $user, Ad $ad)
    {
        return $user->username === $ad->author_name;
    }

}
