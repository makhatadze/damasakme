<?php
/**
 *  database/seeders/AboutSeeder.php
 *
 * Date-Time: 02.05.22
 * Time: 06:52
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::factory(1)->create()->each(function(About $about){
            $transData = [];
            foreach(config('language_manager.locales') as $locale) {
                $transData[$locale] = [
                    'content_1' => 'content_1',
                    'content_2' => 'content_2'
                ];
            }
            $about->update($transData);
        });
    }
}
