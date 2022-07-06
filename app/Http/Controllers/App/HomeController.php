<?php
/**
 * app/Http/Controllers/App/HomeController.php
 *
 * Date-Time: 09.05.22
 * Time: 22:06
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Mail\NotificationMail;
use App\Models\City;
use App\Models\Degree;
use App\Models\Guest;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Inertia\ResponseFactory;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return \Inertia\Response|ResponseFactory
     */
    public function __invoke(Request $request)
    {
        $cities = City::with('translations', 'getCityAreas', 'getCityAreas.getCityAreaDistricts')->get()->toArray();

        $jobs = Job::with('translations')->get()->toArray();

        $degrees = Degree::with('translations')->get()->toArray();

        return inertia('Home')
            ->with('degrees', $degrees)
            ->with('jobs', $jobs)
            ->with('cities', $cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $guests = new Guest();
            $guests->name = $request['first_name'];
            $guests->lastname = $request['last_name'];
            $guests->gender = $request['gender'];
            $guests->birthday = $request['birthday'];
            $guests->email = $request['email'];
            $guests->mobile = $request['mobile'];
            //
            $file = $request->file('file');
            $destinationPath = 'uploads/';
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            $guests->file = $destinationPath . $fileName;
            //
            $guests->city_id = $request['city'];
            $guests->area_id = $request['city_area'];
            $guests->district_id = $request['city_area_district'];
            $guests->street = $request['address'];
            $guests->timestamps = true;
            $guests->save();
            //
            if($request->jobs) {
                foreach ($request->jobs as $key => $job) {
                    DB::table('guest_jobs')->insert([
                        'guest_id' => $guests->id,
                        'job_id' => $job,
                    ]);
                }
            }
            if ($request->degrees) {
                foreach ($request->degrees as $key => $degree):
                    DB::table('guest_educations')->insert([
                        'guest_id' => $guests->id,
                        'education_id' => $degree['id'],
                        'education_name' =>$degree['title'] ,
                        'school' => $degree['school'] ?? null,
                        'profession' => $degree['profession'] ?? null,
                        'start_date' => $degree['start_date'] ?? null,
                        'end_date' => $degree['end_date'] ?? null,
                    ]);
                endforeach;
            }

            //sens email to aplicant disabled
            $emailheaders = [
                'title' => 'მოგესალმებით',
                'body' => 'თქვენი განცხადება მიღებულია მადლობთ'
            ];
            Mail::to($request['email'])->send(new NotificationMail($emailheaders));
            DB::commit();
            return back()->with([
                'type' => 'success',
                'message' => __('თქვენი განცხადება მიღებულია მადლობთ'),
            ]);
        } catch (\Exception $m) {
            DB::rollBack();
            return back()->with([
                'type' => 'warning',
                'message' => $m->getMessage(),
            ]);
        }
    }
}
