<?php
/**
 *  app/Http/Resources/Degree/DegreeCollection.php
 *
 * Date-Time: 29.04.22
 * Time: 17:16
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Resources\Degree;

use Illuminate\Http\Resources\Json\ResourceCollection;
use JetBrains\PhpStorm\ArrayShape;

class DegreeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    #[ArrayShape(['data' => "\Illuminate\Support\Collection"])] public function toArray($request): array|\JsonSerializable|\Illuminate\Contracts\Support\Arrayable
    {
        return [
            'data' => $this->collection,
        ];
    }
}
