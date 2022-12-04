<?php

namespace Database\Factories;

use App\Models\Tienda;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tienda = Tienda::all()->random();

        $name = $this->faker->sentence(3);

        return [
            "producto_nombre" => $name,
            "producto_slug" => Str::slug($name),
            "tienda_id" => $tienda->id,
            "producto_descripcion" => $this->faker->text(120),
            "producto_precio" => $this->faker->randomNumber(4, 1, 100000),
            "producto_stock" => $this->faker->numberBetween(0,100)
        ];
    }
}
