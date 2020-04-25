<?php

namespace App\Policies;

use App\Classroom;
use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    // fonction de l'autorisation view et create calquées sur l'autorisation dans ClassroomPolicy

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        //recherche de classroom dont depend post
        $class_id = $post->classroom->id;
        $classroom = Classroom::find($class_id);
        //recherche de l'id de l'auteur de classroom
        $author = $classroom->user_id;

        if($user->id === $author){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        //recherche de classroom dont depend post
        $class_id = $post->classroom->id;
        $classroom = Classroom::find($class_id);
        //recherche de l'id de l'auteur de classroom
        $author = $classroom->user_id;

        if($user->id === $author){
            return true;
        }
        return false;
    }
}
