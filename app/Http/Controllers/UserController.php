<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserPaginatedResource;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

class UserController extends Controller
{
    /**
     * Search user using the query string
     *
     * @param string $query
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function search($query)
    {
        $users = User::selectRaw("uuid, concat(first_name, ' ', last_name) as name, email")
            ->whereLike('first_name', $query)
            ->orWhereLike('email', $query)
            ->orWhereLike('last_name', $query)
            ->paginate(5);

        return new UserPaginatedResource($users);
    }

    /**
     * Setup project to use
     *
     * @return string
     */
    public function setup()
    {
        Artisan::call("migrate:fresh");
        Artisan::call("key:generate");
        User::factory(100)->create();
        return 'Migration Complete. Use this link for query: ' . route('search', ['query' => 'your_query_string']);
    }

    /**
     * Generate fake user
     *
     * @param int $query
     * @return string
     */
    public function generateUser($total = 10)
    {
        User::factory($total)->create();
        return "$total users generated";
    }
}
