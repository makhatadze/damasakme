<?php
/**
 *  app/Http/Resources/Department/DepartmentResource.php
 *
 * Date-Time: 02.05.22
 * Time: 05:54
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Resources\Department;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class DepartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
     #[ArrayShape(['id' => "mixed", 'title' => "mixed", 'working' => "mixed", 'phone' => "mixed", 'email' => "mixed", 'joined' => "mixed", 'translations' => "\Illuminate\Http\Resources\Json\AnonymousResourceCollection"])] public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'working' => $this->working,
            'phone' => $this->phone,
            'email' => $this->email,
            'joined' => $this->created_at->diffForHumans(),
            'translations' => DepartmentTranslationResource::collection($this->translations)
        ];
    }
}
