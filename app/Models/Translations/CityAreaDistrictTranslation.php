<?php
/**
 *  app/Models/Translations/CityAreaDistrictTranslation.php
 *
 * Date-Time: 21.04.22
 * Time: 15:36
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Translations\CityAreaDistrictTranslation
 *
 * @property int $id
 * @property string $locale
 * @property string|null $title
 * @method static \Illuminate\Database\Eloquent\Builder|CityAreaDistrictTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CityAreaDistrictTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CityAreaDistrictTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CityAreaDistrictTranslation whereAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityAreaDistrictTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityAreaDistrictTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityAreaDistrictTranslation whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityAreaDistrictTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityAreaDistrictTranslation whereTitle($value)
 */
class CityAreaDistrictTranslation extends Model
{
    use HasFactory;

    /** @var string */
    protected $table = 'city_area_district_translations';
}
