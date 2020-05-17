<?php

use App\Section;
use App\User;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return factory(Section::class, 15)
            ->make()
            ->each(function ($faker) {
                $section = new Section();
                $section->name = $faker->name;
                $section->description = $faker->description;
                $section->logo = $faker->logo;
                $section->save();

                $section->users()->attach(User::inRandomOrder()->first());
            });
    }
}
