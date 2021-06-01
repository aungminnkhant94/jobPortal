<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Company;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

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
            'company_name' =>$name = $this->faker->company,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'website' => $this->faker->domainName,
            'logo' => 'avatar/user-male.jpg',
            'cover_photo' => 'cover/company-cover.jpeg',
            'slogan' => 'Everyone Have Their Own Turn',
            'description' => $this->faker->paragraph,
        ];
    }
}
