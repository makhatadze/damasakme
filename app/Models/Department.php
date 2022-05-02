<?php
/**
 *  app/Models/Department.php
 *
 * Date-Time: 02.05.22
 * Time: 05:49
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Models;

use App\Models\Translations\DepartmentTranslation;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes, Translatable;

    /** @var string */
    protected $table = 'departments';

    /** @var string[] */
    protected $fillable = [
        'title',
        'working',
        'email',
        'phone'
    ];

    /** @var string */
    protected string $translationModel = DepartmentTranslation::class;

    /** @var array */
    public array $translatedAttributes = [
        'title',
        'working'
    ];
}
