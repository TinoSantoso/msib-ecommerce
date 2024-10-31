<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productNames = [
            'Wireless Earbuds',
            'Smartphone Stand',
            'Portable Charger',
            'Bluetooth Speaker',
            'Running Shoes',
            'Yoga Mat',
            'LED Desk Lamp',
            'Stainless Steel Water Bottle',
            'Electric Kettle',
            'Ceramic Mug Set',
            'Gaming Mouse',
            'Mechanical Keyboard',
            'Laptop Sleeve',
            'Fitness Tracker',
            'Smart Thermostat',
            'Noise Cancelling Headphones',
            'Backpack',
            'Wireless Charger',
            'Air Purifier',
            'Digital Camera'
        ];

        return [
            'product_name' => $productNames[array_rand($productNames)],
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(100, 500000),
            'stock' => $this->faker->numberBetween(1, 100),
        ];
    }
}
