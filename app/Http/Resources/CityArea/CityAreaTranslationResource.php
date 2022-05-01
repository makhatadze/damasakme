<?php
/**
 *  app/Http/Resources/CityArea/CityAreaTranslationResource.php
 *
 * Date-Time: 01.05.22
 * Time: 08:28
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Resources\CityArea;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class CityAreaTranslationResource extends JsonResource
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
