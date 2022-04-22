<?php
/**
 *  app/Models/LanguageLine.php
 *
 * Date-Time: 22.04.22
 * Time: 09:37
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */

namespace App\Models;


use JetBrains\PhpStorm\ArrayShape;

/**
 * Class LanguageLine
 * @package App\Models
 * @property integer $id
 * @property string $group
 * @property string $key
 * @property string $text
 * @property string $created_at
 * @property string $updated_at
 */
class LanguageLine extends \Spatie\TranslationLoader\LanguageLine
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'language_lines';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['group', 'key', 'text'];

    #[ArrayShape(['id' => "array", 'group' => "array", 'key' => "array", 'text' => "array"])] public function getFilterScopes(): array
    {
        return [
            'id' => [
                'hasParam' => true,
                'scopeMethod' => 'id'
            ],
            'group' => [
                'hasParam' => true,
                'scopeMethod' => 'group'
            ],
            'key' => [
                'hasParam' => true,
                'scopeMethod' => 'key'
            ],
            'text' => [
                'hasParam' => true,
                'scopeMethod' => 'text'
            ]
        ];
    }

    /**
     * @param $query
     * @param $group
     *
     * @return mixed
     */
    public function scopeGroup($query, $group): mixed
    {
        return $query->where('group', 'like', '%' . $group . '%');
    }

    /**
     * @param $query
     * @param $key
     *
     * @return mixed
     */
    public function scopeKey($query, $key): mixed
    {
        return $query->where('key', 'like', '%' . $key . '%');
    }

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

}