<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('slug', 'admin')->first();

        $user = new User([
            'password' => Hash::make('password'),
            'email' => 'admin@test.loc',
            'name' => 'Admin',
        ]);

        $user->save();
        $user->roles()->attach($adminRole);

        factory(User::class, 15)
            ->make()
            ->each(function ($faker) {
                $user = new User();
                $user->name = $faker->name;
                $user->password = $faker->password;
                $user->email = $faker->email;
                $user->save();
            });
    }
}
