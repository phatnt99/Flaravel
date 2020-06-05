<?php

namespace App\Policies;

use App\Models\FlowerCatalog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FlowerCatalogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FlowerCatalog  $flowerCatalog
     * @return mixed
     */
    public function view(User $user, FlowerCatalog $flowerCatalog)
    {
        //
        //onlye user who own this catalog can view detail
        return $user->id === $flowerCatalog->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\FlowerCatalog  $flowerCatalog
     * @return mixed
     */
    public function update(User $user, FlowerCatalog $flowerCatalog)
    {
        //only user who own flower catalog can update it
        return $user->id === $flowerCatalog->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\FlowerCatalog  $flowerCatalog
     * @return mixed
     */
    public function delete(User $user, FlowerCatalog $flowerCatalog)
    {
        //only user who own flower catalog can delete it
        return $user->id === $flowerCatalog->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\FlowerCatalog  $flowerCatalog
     * @return mixed
     */
    public function restore(User $user, FlowerCatalog $flowerCatalog)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\FlowerCatalog  $flowerCatalog
     * @return mixed
     */
    public function forceDelete(User $user, FlowerCatalog $flowerCatalog)
    {
        //
        return true;
    }
}
