<?php

/*
 * This file is part of Strix.
 *
 * For detailed copyright and license information, please view the
 * LICENSE file that was distributed with this source code.
 */

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Strix\Models\App\Models\Model;
use Illuminate\Support\Str;

class BoardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'slug' => Str::slug($this->faker->name),
        ];
    }
}
