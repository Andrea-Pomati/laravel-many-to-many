<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = ['Full-Stack', 'Front-End', 'Back-End'];

        foreach($types as $type) {
            $newType = new Type();

            $newType->name = $type;
            $newType->description = $faker->text(100);
            $newType->slug = Str::slug($newType->name, '-');

            $newType->save();

        }
    }
}
