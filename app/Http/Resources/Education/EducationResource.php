<?php
/**
 * app/Http/Resources/Education/EducationResource.php
 *
 * Date-Time: 13.05.22
 * Time: 04:23
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Resources\Education;

use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'degree' => $this->degree->title,
            'type' => $this->degree->type,
            'name' => $this->education_name,
            'school' => $this->school,
            'profession' => $this->profession,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ];
    }
}
