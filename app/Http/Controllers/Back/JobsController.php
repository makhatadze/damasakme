<?php
/**
 *  app/Http/Controllers/Auth/JobsController.php
 *
 * Date-Time: 24.04.22
 * Time: 12:56
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Http\Resources\Jobs\JobResource;
use App\Models\Job;
use function back;
use function inertia;

class JobsController extends Controller
{

    public function index()
    {
        $jobs = JobResource::collection(Job::with('translations')->latest()->paginate(10));
        return inertia('Jobs/Index', [
            'jobs' => $jobs,
        ]);
    }

    public function store(JobRequest $request): \Illuminate\Http\RedirectResponse
    {
        $attr = $request->toArray();
        Job::create($attr);

        return back()->with([
            'type' => 'success',
            'message' => __('User has been created'),
        ]);
    }

    public function update(JobRequest $request, Job $job): \Illuminate\Http\RedirectResponse
    {
        $attr = $request->toArray();

        $job->update($attr);

        return back()->with([
            'type' => 'success',
            'message' => __('Job has been updated'),
        ]);
    }

    public function destroy(Job $job): \Illuminate\Http\RedirectResponse
    {
        $job->delete();

        return back()->with([
            'type' => 'success',
            'message' => __('Job has been deleted'),
        ]);
    }
}
