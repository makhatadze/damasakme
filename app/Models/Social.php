<?php
/**
 * app/Models/Social.php
 *
 * Date-Time: 13.05.22
 * Time: 07:43
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    /** @var string */
    protected $table = 'socials';

    /** @var string[] */
    protected $fillable = [
        'facebook',
        'instagram',
        'linkedin'
    ];
}
