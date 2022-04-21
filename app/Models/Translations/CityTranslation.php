<?php
/**
 * app/Models/Translations/CityTranslation.php
 *
 * Date-Time: 21.04.22
 * Time: 12:36
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Translations\CityTranslation
 *
 * @property int $id
 * @property string $locale
 * @property string|null $title
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation whereAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CityTranslation whereTitle($value)
 */
class CityTranslation extends BaseTranslationModel
{
    use HasFactory;

    /** @var string */
    protected $table = 'city_translations';
}
