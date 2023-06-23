<?php

namespace Database\Factories;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method Organization create($attributes = [], ?Model $parent = null)
 * @method Organization make($attributes = [], ?Model $parent = null)
 */
class OrganizationFactory extends Factory
{
    protected $model = Organization::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'available' => $this->faker->boolean(),
        ];
    }
}
