<?php
/**
 *  app/Models/Language.php
 *
 * Date-Time: 22.04.22
 * Time: 09:36
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Language
 * @package App\Models
 * @property integer $id
 * @property string $title
 * @property string $locale
 * @property boolean $default
 * @property boolean $status
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 */
class Language extends Model
{
    use HasFactory, softDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'languages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'locale', 'status'];


    public function getFilterScopes(): array
    {
        return [
            'id' => [
                'hasParam' => true,
                'scopeMethod' => 'id'
            ],
            'title' => [
                'hasParam' => true,
                'scopeMethod' => 'title'
            ],
            'locale' => [
                'hasParam' => true,
                'scopeMethod' => 'locale'
            ],
            'status' => [
                'hasParam' => true,
                'scopeMethod' => 'status'
            ]
        ];
    }

}