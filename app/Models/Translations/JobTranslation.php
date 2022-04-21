<?php
/**
 *  app/Models/Translations/JobTranslation.php
 *
 * Date-Time: 21.04.22
 * Time: 16:15
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Translations\JobTranslation
 *
 * @property int $id
 * @property string $locale
 * @property string|null $title
 * @method static \Illuminate\Database\Eloquent\Builder|JobTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|JobTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobTranslation whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobTranslation whereTitle($value)
 */
class JobTranslation extends Model
{
    use HasFactory;

    /** @var string */
    protected $table = 'job_translations';
}
