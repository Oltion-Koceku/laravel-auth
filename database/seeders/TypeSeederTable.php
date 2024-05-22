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
    public function run(): void
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


        }
    }
}
