<?php

namespace Database\Seeders;

use App\Functions\Helper;
use App\Models\Technologie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;




class TechnologieSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $technologies = [
            'Laravel',
            'React',
            'Vue.js',
            'Node.js',
            'Django',
            'Flask',
            'Spring Boot',
            'Ruby on Rails',
            'Angular',
            'ASP.NET Core'
        ];

        foreach( $technologies as $technologie){
            $new_technologie = new Technologie();

            $new_technologie->title = $technologie;
            $new_technologie->slug = Helper::makeSlug($new_technologie->title, Technologie::class);
            $new_technologie->description = $faker->paragraph(4);

            $new_technologie->save();

        }
    }
}
