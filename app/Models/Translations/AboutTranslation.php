<?php
/**
 *  app/Models/Translations/AboutTranslation.php
 *
 * Date-Time: 02.05.22
 * Time: 06:50
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutTranslation extends BaseTranslationModel
{
    use HasFactory;

    /** @var string */
    protected $table = 'about_translations';

    /** @var string[] */
    protected $fillable = [
        'content_1',
        'content_2',
    ];
}
