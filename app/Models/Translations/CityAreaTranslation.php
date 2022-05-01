<?php
/**
 *  app/Models/Translations/CityAreaTranslation.php
 *
 * Date-Time: 21.04.22
 * Time: 15:25
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Translations\CityAreaTranslation
 *
 * @property int $id
 * @property string $locale
 * @property string|null $title
 * @method static \Illuminate\Database\Eloquent\Builder|CityAreaTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CityAreaTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CityAreaTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CityAreaTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityAreaTranslation whereCityAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityAreaTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityAreaTranslation whereTitle($value)
 */
class CityAreaTranslation extends BaseTranslationModel
{
    use HasFactory;

    /** @var string */
    protected $table = 'city_area_translations';


    /** @var string[] */
    protected $fillable = [
        'title',
    ];
}
