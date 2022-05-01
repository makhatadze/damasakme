<?php
/**
 *  app/Http/Resources/CityAreaDistrict/CityAreaDistrictTranslationResource.php
 *
 * Date-Time: 01.05.22
 * Time: 10:27
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Resources\CityAreaDistrict;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class CityAreaDistrictTranslationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    #[ArrayShape(['locale' => "mixed", 'title' => "mixed"])] public function toArray($request): array|\JsonSerializable|\Illuminate\Contracts\Support\Arrayable
    {
        return [
            'locale' => $this->locale,
            'title' => $this->title,
        ];
    }
}
