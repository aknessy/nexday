<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $randomPasswordString = GenerateRandom(8);
        $latitudeLongitude = [
            'lat' => $this->faker->latitude($min = -90, $max = 90),
            'long' =>  $this->faker->longitude($min = -180, $max = 180)
        ];

        return [
            'userUnique' => $this->faker->regexify('[A-Z]{5}[0-4]{3}'),
            'firstname' => $this->faker->firstName(),
            'middlename' => $this->faker->firstNameMale(),
            'lastname' => $this->faker->lastName(),
            'gender' => 'female',
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'dateofbirth' => strtotime('now'),
            'usertype' => 'user',
            'state' => $this->faker->state(),
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
            'gps_location' => json_encode($latitudeLongitude),
            'status' => 0,
            'password' => Hash::make($randomPasswordString),
            'password_text' => $randomPasswordString,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
