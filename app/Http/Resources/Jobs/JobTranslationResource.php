<?php
/**
 *  app/Http/Resources/Jobs/JobResource.php
 *
 * Date-Time: 24.04.22
 * Time: 13:00
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Resources\Jobs;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class JobTranslationResource extends JsonResource
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
