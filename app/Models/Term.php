<?php
/**
 * app/Models/Term.php
 *
 * Date-Time: 13.05.22
 * Time: 07:57
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Models;

use App\Models\Translations\TermTranslations;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Term extends Model
{
    use HasFactory, SoftDeletes, Translatable;

    /** @var string */
    protected $table = 'terms';

    /** @var string[] */
    protected $fillable = [
        'content',
    ];

    /** @var string */
    protected string $translationModel = TermTranslations::class;

    /** @var array */
    public array $translatedAttributes = [
        'content',
    ];
}
