<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model|TModel>
     */
    protected $model = \App\Models\Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $inventory_id = rand(1, 10);
        $package_id = rand(1, 6);
        $berat_pakaian = rand(1, 8);

        return [
            "customer_id" => $this->faker->random_int,
            "package_id" => $package_id,
            "inventory_id" => $inventory_id,
            "berat_pakaian" => $berat_pakaian,
            "total_harga" => $this->faker->random_int,
            "estimasi" => $this->faker->random_int,
            "waktu_pencucian" => $this->faker->random_int,
            "penggunaan_air" => $this->faker->random_int,
            "status" => "QUEUE",
            "is_paid" => false,
            "is_refund" => false,
        ];
    }
}
