<?php

use Illuminate\Database\Seeder;

class OauthClientEndpointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\oauth_client_endpoint::class, 10)->create();
    }
}
