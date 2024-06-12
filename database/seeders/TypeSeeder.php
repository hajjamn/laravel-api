<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $types = [
            [
                "name" => "FrontEnd",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat doloremque voluptatum cupiditate. Provident dicta ex nobis ipsa, voluptatum vel facere magni deleniti, incidunt nulla recusandae omnis itaque, accusamus aspernatur veniam."
            ],
            [
                "name" => "BackEnd",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, quia vitae. Iste earum, incidunt enim natus, minus voluptatibus, repudiandae nostrum eaque quos itaque nam! Temporibus magnam nihil fuga nostrum corporis."
            ],
            [
                "name" => "FullStack",
                "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat doloremque voluptatum cupiditate. Provident dicta ex nobis ipsa, voluptatum vel facere magni deleniti, incidunt nulla recusandae omnis itaque, accusamus aspernatur veniam."
            ],
        ];

        foreach ($types as $type) {

            $new_type = new Type();
            $new_type->name = $type['name'];
            $new_type->slug = Str::slug($type['name']);
            $new_type->description = $type['description'];

            $new_type->save();

        }
    }
}
