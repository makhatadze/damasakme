<?php
/**
 *  app/Http/Resources/CityAreaDistrict/CityAreaDistrictCollection.php
 *
 * Date-Time: 01.05.22
 * Time: 10:24
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Resources\CityAreaDistrict;

use Illuminate\Http\Resources\Json\ResourceCollection;
use JetBrains\PhpStorm\ArrayShape;

class CityAreaDistrictCollection extends ResourceCollection
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
