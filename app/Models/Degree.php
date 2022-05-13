<?php
/**
 *  app/Models/Degree.php
 *
 * Date-Time: 21.04.22
 * Time: 15:49
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */

namespace App\Models;

use App\Models\Translations\CityAreaDistrictTranslation;
use App\Models\Translations\DegreeTranslation;
use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\Degree
 *
 * @property int $id
 * @property boolean $type
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 */
class Degree extends Model
{
    use HasFactory, SoftDeletes, Translatable;

    /** @var string */
    protected $table = 'degrees';

    /** @var string[] */
    protected $fillable = [
        'title',
        'type'
    ];

    /** @var string */
    protected string $translationModel = DegreeTranslation::class;

    /** @var array */
    public array $translatedAttributes = [
        'title',
    ];

    public function guest()
    {
        return $this->belongsToMany(Guest::class);
    }
    public static function getEdus($id=null){
        return DB::table('guest_educations')->where('guest_id','=',$id)->get();
    }
}
