<?php
/**
 * app/Models/City.php
 *
 * Date-Time: 21.04.22
 * Time: 10:22
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use App\Models\Translations\CityTranslation;
use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\City
 *
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 */
class City extends Model implements TranslatableContract
{
    use HasFactory, SoftDeletes, Translatable;

    /** @var string */
    protected $table = 'cities';

    /** @var string[] */
    protected $fillable = [
        'title',
    ];

    /** @var string */
    protected string $translationModel = CityTranslation::class;

    /** @var array */
    public array $translatedAttributes = [
        'title',
    ];
}
