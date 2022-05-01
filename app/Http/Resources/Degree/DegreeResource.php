<?php
/**
 *  app/Http/Resources/Degree/DegreeResource.php
 *
 * Date-Time: 29.04.22
 * Time: 17:03
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Resources\Degree;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class DegreeResource extends JsonResource
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
            'translations' => DegreeTranslationResource::collection($this->translations)
        ];
    }
}
