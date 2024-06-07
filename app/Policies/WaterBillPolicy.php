<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WaterBill;
use Illuminate\Auth\Access\Response;

class WaterBillPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, WaterBill $waterBill): Response
    {
        return $user->role === 'admin' ? Response::allow() : ($user->id === $waterBill->user_id ? Response::allow() : Response::deny('You are not authorized to view a water bill'));
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->role === 'admin' ? Response::allow() : Response::deny('You are not authorized to create a water bill');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, WaterBill $waterBill): Response
    {
        return $user->role === 'admin' ? Response::allow() : Response::deny('You are not authorized to update a water bill');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, WaterBill $waterBill): Response
    {
        return $user->role === 'admin' ? Response::allow() : Response::deny('You are not authorized to delete a water bill');
    }
}
