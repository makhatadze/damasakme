<?php
/**
 *  database/seeders/JobSeeder.php
 *
 * Date-Time: 29.04.22
 * Time: 16:47
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * @var string[]
     */
    protected array $jobs = [
        'TOP მენეჯმენტი',
        'ადამიანური რესურსები',
        'ადმინისტრაცია',
        'ავიაცია/აეროპორტი',
        'ავტო-მოტო სერვისი',
        'არასამთავრობო (NGO)',
        'ბუღალტერია/ფინანსები',
        'გაყიდვები',
        'დაზღვევა',
        'დასუფთავება',
        'ენერგეტიკა',
        'ინჟინერია',
        'ინფორმაციული ტექნოლოგიები',
        'იურიდიული',
        'კაზინო/აზარტული თამაშები',
        'ლოგისტიკა/ტრანსპორტი',
        'მარკეტინგი, რეკლამა, PR',
        'მეცნიერება/განათლება',
        'საბანკო',
        'საზღვაო/პორტი',
        'სამედიცინო',
        'სამშენებლო, უძრავი ქონება',
        'სასტუმრო/რესტორანი/კვება',
        'საჯარო სამსახური',
        'სილამაზე/ესთეტიკური მედიცინა',
        'სოფლის მეურნეობა',
        'ტენდერი/კონკურსი',
        'ტრენინგ-კურსები/სასწავლო პროგრამები',
        'ტურიზმი/გართობის სექტორი',
        'უშიშროება/დაცვა',
        'შესყიდვები',
        'წარმოება/ოპერაციები',
        'ხარისხის კონტროლი, გარემოს დაცვა, უსაფრთხოება',
        'ხელოვნება/მედია',
        'ხელოსანი/შეკეთება/მონტაჟი',
        'სხვა'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->jobs as $item) {
            Job::factory(1)->create()->each(function(Job $job) use($item){
                $transData = [];
                foreach(config('language_manager.locales') as $locale) {
                    $transData[$locale] = [
                        'title' => $item
                    ];
                }
                $job->update($transData);
            });
        }
    }
}
