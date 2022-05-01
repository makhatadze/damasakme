<?php
/**
 *  app/Http/Resources/CityArea/CityAreaResource.php
 *
 * Date-Time: 01.05.22
 * Time: 08:27
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Resources\CityArea;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class CityAreaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    #[ArrayShape(['id' => "mixed", 'city' => "mixed", 'city_title' => "mixed", 'title' => "mixed", 'joined' => "mixed", 'translations' => "\Illuminate\Http\Resources\Json\AnonymousResourceCollection"])] public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'city' => $this->city,
            'city_title' => $this->getCity->title,
            'title' => $this->title,
            'joined' => $this->created_at->diffForHumans(),
            'translations' => CityAreaTranslationResource::collection($this->translations)
        ];
    }
}
