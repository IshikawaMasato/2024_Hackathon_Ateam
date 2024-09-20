<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    // PostPolicy.php
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id; // 投稿の所有者のみ削除できる
    }

}
