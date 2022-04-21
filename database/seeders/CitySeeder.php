<?php
/**
 * database/seeders/CitySeeder.php
 *
 * Date-Time: 21.04.22
 * Time: 10:24
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * @var string[]
     */
    protected $cities = [
        'თბილისი',
        'ბათუმი',
        'ქუთაისი',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->cities as $item) {
            City::factory(1)->create()->each(function(City $city) use($item){
                $transData = [];
                foreach(config('language_manager.locales') as $locale) {
                    $transData[$locale] = [
                        'title' => $item
                    ];
                }
                $city->update($transData);
            });
        }
    }
}
