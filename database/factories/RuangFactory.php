<?php

namespace Database\Factories;

use App\Models\Ruang;
use Illuminate\Database\Eloquent\Factories\Factory;

class RuangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ruang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_ruang' => $this->faker->word,
        'nama_ruang' => $this->faker->word,
        'jenis_ruang' => $this->faker->word,
        'keterangan' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
