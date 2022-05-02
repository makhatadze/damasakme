<?php
/**
 *  database/factories/AboutFactory.php
 *
 * Date-Time: 02.05.22
 * Time: 07:09
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace Database\Factories;

use App\Models\About;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class AboutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = About::class;

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
