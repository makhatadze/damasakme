<?php
/**
 *  app/Http/Controllers/Back/AboutController.php
 *
 * Date-Time: 02.05.22
 * Time: 07:07
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use function back;
use function inertia;

class AboutController extends Controller
{

    public function edit(): \Inertia\Response|\Inertia\ResponseFactory
    {
        $about = About::with('translations')->first()->toArray();

        return inertia('About/Index', [
            'about' => $about,
        ]);
    }

    public function update(AboutRequest $request, About $about): \Illuminate\Http\RedirectResponse
    {
        $attr = $request->toArray();

        $about->update($attr);

        return back()->with([
            'type' => 'success',
            'message' => __('About has been updated'),
        ]);
    }
}
