<?php
/**
 * app/Http/Controllers/Back/SocialController.php
 *
 * Date-Time: 13.05.22
 * Time: 07:43
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use App\Models\Social;
use Illuminate\Http\Request;
use function back;
use function inertia;

class SocialController extends Controller
{

    public function edit(): \Inertia\Response|\Inertia\ResponseFactory
    {
        $social = Social::first()->toArray();

        return inertia('Social/Index', [
            'social' => $social,
        ]);
    }

    public function update(Request $request, Social $social): \Illuminate\Http\RedirectResponse
    {
        $attr = $request->toArray();

        $social->update($attr);

        return back()->with([
            'type' => 'success',
            'message' => __('Social has been updated'),
        ]);
    }
}
