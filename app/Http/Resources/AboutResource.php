<?php
/**
 * app/Http/Resources/AboutResource.php
 *
 * Date-Time: 13.05.22
 * Time: 07:28
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'content_1' => $this->content_1,
            'content_2' => $this->content_2,
        ];
    }
}
