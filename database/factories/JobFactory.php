<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => User::all()->random()->id,
            'company_id' => Company::all()->random()->id, 
            'title' => $title= $this->faker->text,
            'position' => $this->faker->jobTitle,
            'address' => $this->faker->address,
            'category_id' => rand(1,10),
            'type' => 'fulltime' ,
            'status' => rand(0,1),
            'description' => $this->faker->paragraph,
            'roles' => $this->faker->text,
            'last_date' => $this->faker->DateTime,
        ];
    }
}
