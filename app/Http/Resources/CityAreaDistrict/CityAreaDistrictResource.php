<?php
/**
 *  app/Http/Resources/CityAreaDistrict/CityAreaDistrictResource.php
 *
 * Date-Time: 01.05.22
 * Time: 10:25
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Resources\CityAreaDistrict;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class CityAreaDistrictResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    #[ArrayShape(['id' => "mixed", 'city_area' => "mixed", 'city_area_title' => "mixed", 'title' => "mixed", 'joined' => "mixed", 'translations' => "\Illuminate\Http\Resources\Json\AnonymousResourceCollection"])] public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'city_area' => $this->city_area,
            'city_area_title' => $this->getCityArea->title,
            'title' => $this->title,
            'joined' => $this->created_at->diffForHumans(),
            'translations' => CityAreaDistrictTranslationResource::collection($this->translations)
        ];
    }
}
