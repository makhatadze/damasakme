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
use App\Models\CityArea;
use App\Models\CityAreaDistrict;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * @var string[]
     */
    protected array $cities = [
        [
            'title' => 'თბილისი',
            'items' => [
                [
                    'title' => 'ვაკე/საბურთალო',
                    'items' => [
                        'ბაგები',
                        'დიდი დიღომი',
                        'დიღომი 1-9',
                        'ვაშლიჯვარი',
                        'ვეძისი',
                        'თხინვალი',
                        'კუს ტბა',
                        'ლისის ტბა',
                        'ნუცუბიძის ფერდობი',
                        'საბურთალო',
                        'სოფ. დიღომი',
                        'ვაჟა ფშაველას კვარტლები',
                    ]
                ],
                [
                    'title' => 'ისანი-სამგორი',
                    'items' => [
                        'აეროპორტის დას.',
                        'დამპალოს დას.',
                        'ვაზისუბანი',
                        'ვარკეთილი',
                        'ისანი',
                        'ლილო',
                        'მესამე მასივი',
                        'ნავთლუღი',
                        'ორთაჭალა',
                        'ორხევი',
                        'ფონიჭალა',
                        'აეროპორტის გზატ.',
                        'აფრიკის დას',
                    ]
                ],
                [
                    'title' => 'გლდანი-ნაძალადევი',
                    'items' => [
                        'ავჭალა',
                        'გლდანი',
                        'გლდანულა',
                        'ზაჰესი',
                        'თბილისის ზღვა',
                        'ივერთუბანი',
                        'კონიაკის დას.',
                        'ლოტკინი.',
                        'მუხიანი.',
                        'ნაძალადევი',
                        'სანზონა',
                        'სოფ. გლდანი',
                    ]
                ],
                [
                    'title' => 'დიდუბე-ჩუღურეთი',
                    'items' => [
                        'დიდუბე',
                        'დიღმის მასივი',
                        'კუკია',
                        'სვანეთის უბანი',
                        'ჩუღურეთი',
                    ]
                ],
                [
                    'title' => 'ძველი თბილისი',
                    'items' => [
                        'აბანოთუბანი',
                        'ავლაბარი',
                        'ელია',
                        'ვერა',
                        'მთაწმინდა',
                        'სოლოლაკი'
                    ]
                ],
            ],
        ],
        [
            'title' => 'ბათუმი',
            'items' => [

            ]
        ],
        [
            'title' => 'ქუთაისი',
            'items' => [

            ]
        ]
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
                        'title' => $item['title']
                    ];
                }
                $city->update($transData);
                // Insert city_areas
                if (count($item['items'])) {
                    foreach ($item['items'] as $cityAreaItem) {
                        CityArea::factory(1)->create([
                            'city' => $city->id
                        ])->each(function(CityArea $cityArea) use($cityAreaItem){
                            $transData = [];
                            foreach(config('language_manager.locales') as $locale) {
                                $transData[$locale] = [
                                    'title' => $cityAreaItem['title']
                                ];
                            }
                            $cityArea->update($transData);

                            // Insert city_area_districts
                            if (count($cityAreaItem['items'])) {
                                foreach ($cityAreaItem['items'] as $cityAreaDistrictItem) {
                                    CityAreaDistrict::factory(1)->create([
                                        'city_area' => $cityArea->id
                                    ])->each(function(CityAreaDistrict $cityAreaDistrict) use($cityAreaDistrictItem){
                                        $transData = [];
                                        foreach(config('language_manager.locales') as $locale) {
                                            $transData[$locale] = [
                                                'title' => $cityAreaDistrictItem
                                            ];
                                        }
                                        $cityAreaDistrict->update($transData);

                                    });
                                }
                            }
                        });
                    }
                }
            });
        }
    }
}
