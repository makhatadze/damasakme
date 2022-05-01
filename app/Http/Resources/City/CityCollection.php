<?php
/**
 *  app/Http/Resources/City/CityCollection.php
 *
 * Date-Time: 01.05.22
 * Time: 08:14
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Resources\City;

use Illuminate\Http\Resources\Json\ResourceCollection;
use JetBrains\PhpStorm\ArrayShape;

class CityCollection extends ResourceCollection
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
