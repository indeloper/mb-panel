<?php

namespace Database\Factories;

use App\Models\Division;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method Division create($attributes = [], ?Model $parent = null)
 * @method Division make($attributes = [], ?Model $parent = null)
 */
class DivisionFactory extends Factory
{
    protected $model = Division::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'available' => $this->faker->boolean(),

            'organization_id' => Organization::all()->random()->getKey(),
        ];
    }
}
