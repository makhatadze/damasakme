<?php
/**
 *  app/Models/Translations/DepartmentTranslation.php
 *
 * Date-Time: 02.05.22
 * Time: 05:50
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentTranslation extends BaseTranslationModel
{
    use HasFactory;

    /** @var string[] */
    protected $fillable = [
        'title',
        'working'
    ];
}
