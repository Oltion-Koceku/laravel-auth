<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Functions\Helper;
use App\Models\Type;
use Faker\Generator as Faker;



class TypeSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = [
            'Web Development',
            'Mobile Development',
            'Data Science',
            'Game Development',
            'DevOps',
            'Machine Learning',
            'Artificial Intelligence',
            'Cybersecurity',
            'Cloud Computing',
            'Internet of Things'
        ];

        foreach( $types as $type ){

            $new_type = new Type();

            $new_type->title = $type;
            $new_type->slug = Helper::makeSlug( $new_type->title, Type::class);
            $new_type->description = $faker->paragraph(4);

            $new_type->save();


        }
    }
}
