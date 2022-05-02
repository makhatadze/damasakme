<?php
/**
 *  app/Models/About.php
 *
 * Date-Time: 02.05.22
 * Time: 06:50
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Models;

use App\Models\Translations\AboutTranslation;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class About extends Model
{
    use HasFactory, SoftDeletes, Translatable;

    /** @var string */
    protected $table = 'abouts';

    /** @var string[] */
    protected $fillable = [
        'content_1',
        'content_2',
    ];

    /** @var string */
    protected string $translationModel = AboutTranslation::class;

    /** @var array */
    public array $translatedAttributes = [
        'content_1',
        'content_2',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function file(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable');
    }
}
