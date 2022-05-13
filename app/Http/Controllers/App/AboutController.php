<?php
/**
 *  app/Http/Controllers/App/AboutController.php
 *
 * Date-Time: 01.05.22
 * Time: 12:33
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutResource;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function __invoke(Request $request): \Inertia\Response|\Inertia\ResponseFactory
    {
        $about = new AboutResource(About::with('translations')->first());

        return inertia('About/Index',[
            'about' => $about
        ]);
    }
}
