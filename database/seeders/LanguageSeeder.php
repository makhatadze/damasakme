<?php
/**
 *  database/seeders/LanguageSeeder.php
 *
 * Date-Time: 22.04.22
 * Time: 09:45
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    // Language array
    protected $languages = [
        [
            'title' => 'ქართული',
            'locale' => 'ka',
            'status' => true,
            'default' => true
        ],
        [
            'title' => 'English',
            'locale' => 'en',
            'status' => true,
            'default' => false
        ],
        [
            'title' => 'Русский',
            'locale' => 'ru',
            'status' => true,
            'default' => false
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert languages
        foreach($this->languages as $item) {
            Language::create($item);
        }
    }
}
