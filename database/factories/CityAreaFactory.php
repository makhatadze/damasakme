<?php
/**
 *  database/factories/CityAreaFactory.php
 *
 * Date-Time: 30.04.22
 * Time: 20:17
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace Database\Factories;

use App\Models\CityArea;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class CityAreaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CityArea::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }
}
