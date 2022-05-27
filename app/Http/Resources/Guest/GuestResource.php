<?php
/**
 * app/Http/Resources/Guest/GuestResource.php
 *
 * Date-Time: 13.05.22
 * Time: 03:59
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Resources\Guest;

use App\Http\Resources\Education\EducationResource;
use App\Http\Resources\Jobs\JobResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class GuestResource extends JsonResource
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
        $jobs = collect($this->jobs ? $this->jobs->map(
            function ($job) {
                return $job->job->title;
            }
        ) : []);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'birthday' => $this->birthday,
            'age' => \Illuminate\Support\Carbon::parse($this->birthday)->age . ' ' .__('age'),
            'email' => $this->email,
            'address' => $this->street,
            'city' => $this->city->title,
            'area' => $this->area ? $this->area->title : '',
            'district' => $this->district ? $this->district->title : '',
            'educations' => $this->educations ? $this->educations->map(
                function ($education) {
                    return new EducationResource($education);
                }
            ) : [],
            'jobs' => $this->jobs ? $this->jobs->map(
                function ($job) {
                    return new JobResource($job->job);
                }
            ) : [],
            'joined' => $this->created_at->diffForHumans(),
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d'),
            'gender' => $this->gender,
            'file' =>asset($this->file)
        ];
    }
}
