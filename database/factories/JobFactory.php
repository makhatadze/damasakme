<?php
/**
 *  database/factories/JobFactory.php
 *
 * Date-Time: 29.04.22
 * Time: 16:54
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

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
