<?php
/**
 *  database/factories/DegreeFactory.php
 *
 * Date-Time: 29.04.22
 * Time: 17:15
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace Database\Factories;

use App\Models\Degree;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class DegreeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Degree::class;

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
