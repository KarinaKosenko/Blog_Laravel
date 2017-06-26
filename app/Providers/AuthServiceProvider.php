<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\CommentPolicy;
use App\Policies\MessagePolicy;
use App\Models\Comment;
use App\Models\Message;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Comment::class => CommentPolicy::class,
        Message::class => MessagePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /**
         * Gates for admin panel.
         */

        Gate::define('to_edit_article', function ($user, $article) {
            return $user->id == $article->user_id;
        });

        Gate::define('to_delete_article', function ($user, $article) {
            return $user->id == $article->user_id;
        });
    }
}
