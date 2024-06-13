<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $types = Type::all();
        $types_ids = $types->pluck('id')->all();

        $technologies = Technology::all();
        $technologies_ids = $technologies->pluck('id')->all();

        //
        for ($i = 0; $i < 10; $i++) {

            $project = new Project();

            $title = $faker->sentence(4);
            $project->title = $title;

            $project->repo = Str::slug($title, '-');

            $project->description = $faker->text(200);

            $project->type_id = $faker->randomElement($types_ids);

            $project->save();

            $random_technology_id = $faker->randomElements($technologies_ids, null);

            $project->technologies()->attach($random_technology_id);

        }
    }
}
