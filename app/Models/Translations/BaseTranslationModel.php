<?php
/**
 * app/Models/Translations/BaseTranslationModel.php
 *
 * Date-Time: 21.04.22
 * Time: 12:33
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Models\Translations;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Translations\BaseTranslationModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BaseTranslationModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseTranslationModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseTranslationModel query()
 */
class BaseTranslationModel extends Model
{
    /** @var bool */
    public $timestamps = false;
}
