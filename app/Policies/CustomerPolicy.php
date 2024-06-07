<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CustomerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return $user->role === 'admin' ? Response::allow() : Response::deny('You are not authorized to view any customer');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Customer $customer): Response
    {
        return $user->role === 'admin' || $user->id === $customer->user_id ? Response::allow() : Response::deny('You are not authorized to view a customer');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->role === 'customer' ? Response::allow() : Response::deny('You are not authorized to create a customer');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Customer $customer): Response
    {
        //
        return $user->id === $customer->user_id ? Response::allow() : Response::deny('You are not authorized to update a customer');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Customer $customer): Response
    {
        //
        return $user->id === $customer->user_id ? Response::allow() : Response::deny('You are not authorized to delete a customer');
    }
}
