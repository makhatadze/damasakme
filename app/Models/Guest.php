<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Guest extends Model
{
    use HasFactory;
    protected $table='guests';
    protected $fillable=[
        'name',
        'lastname',
        'birthday',
        'gender',
        'email',
        'mobile',
        'file',
        'city_id',
        'area_id',
        'district_id',
        'street',
        'education_id',
        'school',
        'proffession',
        'strat_date',
        'end_date',
        'jobsarray',
        'created_at'];
    protected $casts=[
        'jobsarray'=>'json',
    ];

    public static function getGuests()
    {
            $array=[];
            $guests = Guest::query();
            if (old('gender')!=null){
                $guests->where('gender', old('gender'));
            }
            if (old('street')!=null){
                $guests->where('street','like', '%'.old('street'));
            }
            if (old('education')!=null){
                $guests->whereIn('id', array_values(Guest::getGuestFromEdu(old('education'))));
            }
            if (old('jobs')!=null){
                $guests->whereIn('id', array_values(Guest::getGuestFromJob(old('jobs'))));
            }
            if (old('area')!=null){
                $guests->where('area_id',old('area'));
            }
            if (old('age')!=null){
                $toDate = now()->subYears(old('age'));
                $additionalDays = old('age')/4;
                $fromDate = now()->subDays(round((old('age') * 365) + 364 + $additionalDays)); //naxe aba moakopire macbookit var
                $guests->whereBetween('birthday',[$fromDate,$toDate]);
            }
            foreach ($guests->get() as $g){
                $array[]=[
                    'id'=>$g['id'],
                    'name'=>$g['name'],
                    'lastname'=>$g['lastname'],
                    'birthday'=>$g['birthday'],
                    'age'=>Carbon::parse($g['birthday'])->age.' წელი',
                    'gender'=> Guest::getGender($g['gender']),
                    'email'=>$g['email'],
                    'mobile'=>$g['mobile'],
                    'city_id'=>$g->city($g['city_id'])['city_name'],
                    'area_id'=>isset($g['area_id'])? $g->area($g['area_id'])['area_name']:'',
                    'district_id'=>isset($g['district_id'])?$g->district($g['district_id'])['district_name']:'',
                    'street'=>$g['street'],
                    'education'=>$g->guestEdu($g['id'],true),
                    'jobsarray'=>$g->job($g['id'],true),
                    'created_at'=>$g['created_at']
                ];
            }
            return $array;
    }
    private static function getGender($val){
        if($val=='male'){
            return __('whole.male');
        }elseif ($val=='female'){
            return 'whole.female';
        }
    }
    public function city($id=null)
    {
        if($id){
            return City::where('id',$id)->first();
        }else {
            return $this->hasOne(City::class, 'id', 'city_id');
        }
    }
    public function area($id=null)
    {
        if($id){
            if(CityArea::where('id',$id)->first()){
                return CityArea::where('id',$id)->first();
            }else{
                return ['title'=>''];
            }
        }else {
            return $this->hasOne(CityArea::class, 'id', 'area_id');
        }
    }
    public function district($id=null)
    {
        if($id){
            if(CityAreaDistrict::where('id',$id)->first()){
                return CityAreaDistrict::where('id',$id)->first();
            }else{
                return ['title'=>''];
            }
        }else {
            return $this->hasOne(CityAreaDistrict::class, 'id', 'district_id');
        }
    }

    /**
     * @return HasMany
     */
    public function educations(): HasMany
    {
        return $this->hasMany(GuestEducations::class,'guest_id','id');
    }

    /**
     * @return HasMany
     */
    public function jobs(): HasMany
    {
        return $this->hasMany(GuestJob::class,'guest_id','id');
    }

    public static function getGuestFromJob($id=null){
        if($id){
            $collection = DB::table('guest_jobs')
                ->where('job_id','=',$id)
                ->pluck('guest_id')
                ->all();
            return $collection;
        }
        return false;
    }
    public static function getGuestFromEdu($id=null)
    {
        if($id){
            $collection = DB::table('guest_educations')
                ->where('education_id','=',$id)
                ->pluck('guest_id')
                ->all();
            return $collection;
       }
        return false;
    }
    public function job($id=null,$c=null)
    {
        if ($id){
            $jobs=[];
            if ($c){
                foreach (Job::getJobs($id) as $item) {
                    $jobs[]=Job::where('id',$item->job_id)->first()['title'];
                }
                return implode(', ',$jobs);
            }else{
                foreach (Job::getJobs($id) as $item) {
                    $jobs[]=Job::where('id',$item->job_id)->first();
                }
                return $jobs;
            }
        }else{
            return '';
        }
    }
}
