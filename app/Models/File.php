<?php
/**
 *  app/Models/File.php
 *
 * Date-Time: 21.04.22
 * Time: 16:10
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\File
 *
 * @property int $id
 * @property string $name
 * @property string $path
 * @property string $format
 * @property string $type
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 */
class File extends Model
{
    use HasFactory, SoftDeletes;

    /** @var string */
    protected $table = 'files';

    /** @var string[] */
    protected $fillable = [
        'name',
        'path',
        'format',
        'type',
    ];


    /**
     * Get the parent fileable model (user or post).
     */
    public function fileable()
    {
        return $this->morphTo();
    }
}
