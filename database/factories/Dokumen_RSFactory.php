<?php

namespace Database\Factories;

use App\Models\Dokumen_RS;
use Illuminate\Database\Eloquent\Factories\Factory;

class Dokumen_RSFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dokumen_RS::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nomor' => $this->faker->word,
        'nama' => $this->faker->word,
        'deskripsi' => $this->faker->text,
        'file' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
