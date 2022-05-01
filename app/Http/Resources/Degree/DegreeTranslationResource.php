<?php
/**
 *  app/Http/Resources/Degree/DegreeTranslationResource.php
 *
 * Date-Time: 29.04.22
 * Time: 17:14
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Resources\Degree;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class DegreeTranslationResource extends JsonResource
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
