<?php
/**
 *  app/Http/Resources/City/CityResource.php
 *
 * Date-Time: 01.05.22
 * Time: 08:13
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Resources\City;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    #[ArrayShape(['id' => "mixed", 'title' => "mixed", 'joined' => "mixed", 'translations' => "mixed"])] public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'joined' => $this->created_at->diffForHumans(),
            'translations' => CityTranslationResource::collection($this->translations)
        ];
    }
}
