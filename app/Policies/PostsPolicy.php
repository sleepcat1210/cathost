<?php

namespace App\Policies;

use App\User;
use App\Http\Models\Posts;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostsPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
         //
    }

    public function update(User $users, Posts $posts)
    {
        
        return $users->id === $posts->user_id;
    }
    //删除
    public function delete(User $users,Posts $posts){
        return $users->id ===$posts->user_id;
    }

}
