<?php
/**
 *  database/seeders/DegreeSeeder.php
 *
 * Date-Time: 29.04.22
 * Time: 17:15
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */

namespace Database\Seeders;

use App\Models\Degree;
use Illuminate\Database\Seeder;

class DegreeSeeder extends Seeder
{
    /**
     * @var string[]
     */
    protected array $degrees = [
        'ატესტატი',
        'ბაკალავრი',
        'მაგისტრატურა',
        'დოქტურანტურა'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->degrees as $item) {
            Degree::factory(1)->create()->each(function(Degree $degree) use($item){
                $transData = [];
                foreach(config('language_manager.locales') as $locale) {
                    $transData[$locale] = [
                        'title' => $item
                    ];
                }
                $degree->update($transData);
            });
        }
    }
}
