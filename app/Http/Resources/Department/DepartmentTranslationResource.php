<?php
/**
 *  app/Http/Resources/Department/DepartmentTranslationResource.php
 *
 * Date-Time: 02.05.22
 * Time: 05:55
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Resources\Department;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class DepartmentTranslationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    #[ArrayShape(['locale' => "mixed", 'working' => "mixed", 'title' => "mixed"])] public function toArray($request): array|\JsonSerializable|\Illuminate\Contracts\Support\Arrayable
    {
        return [
            'locale' => $this->locale,
            'working' => $this->working,
            'title' => $this->title,
        ];
    }
}
