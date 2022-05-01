<?php
/**
 *  app/Models/CityAreaDistrict.php
 *
 * Date-Time: 21.04.22
 * Time: 15:37
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */

namespace App\Models;

use App\Models\Translations\CityAreaDistrictTranslation;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CityAreaDistrict extends Model
{
    use HasFactory, SoftDeletes, Translatable;

    /** @var string */
    protected $table = 'city_area_districts';

    /** @var string[] */
    protected $fillable = [
        'city_area',
        'title',
    ];

    /** @var string */
    protected string $translationModel = CityAreaDistrictTranslation::class;
    protected string $translationForeignKey = 'district_id';

    /** @var array */
    public array $translatedAttributes = [
        'title',
    ];
}
