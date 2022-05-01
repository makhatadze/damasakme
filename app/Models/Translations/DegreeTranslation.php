<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Translations\DegreeTranslation
 *
 * @property int $id
 * @property string $locale
 * @property string|null $title
 * @method static \Illuminate\Database\Eloquent\Builder|DegreeTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DegreeTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DegreeTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|DegreeTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DegreeTranslation whereTitle($value)
 */
class DegreeTranslation extends BaseTranslationModel
{
    use HasFactory;

    /** @var string */
    protected $table = 'degree_translations';

    /** @var string[] */
    protected $fillable = [
        'title',
    ];
}
