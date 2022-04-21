<?php
/**
 *  app/Models/Job.php
 *
 * Date-Time: 21.04.22
 * Time: 16:12
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */

namespace App\Models;

use App\Models\Translations\JobTranslation;
use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Job
 *
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 */
class Job extends Model
{
    use HasFactory, SoftDeletes, Translatable;

    /** @var string */
    protected $table = 'jobs';

    /** @var string[] */
    protected $fillable = [
        'title',
    ];

    /** @var string */
    protected string $translationModel = JobTranslation::class;

    /** @var array */
    public array $translatedAttributes = [
        'title',
    ];
}
