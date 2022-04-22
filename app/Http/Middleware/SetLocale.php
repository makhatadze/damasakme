<?php
/**
 *  app/Http/Middleware/SetLocale.php
 *
 * Date-Time: 22.04.22
 * Time: 09:57
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\TranslationLoader\TranslationLoaders\Db;


/**
 * Class SetLocale
 * @package App\Http\Middleware
 */
class SetLocale
{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $defaultLocale = Language::where('default', true)->first();

        if (!session()->has('locale')) {
            session(['locale' => $defaultLocale->locale]);
        }
        $locale = session()->get('locale');

        $language = Language::where('status', true)->where('locale', $locale)->first();;
        if (!$language) {
            $language = $defaultLocale;
        }

        app()->setLocale($language->locale);

        //languages for inertia
        $trans = new Db();


        Inertia::share("currentLocale", $language->locale);
        Inertia::share("localizations", $trans->loadTranslations($language->locale,"whole"));
        return $next($request);
    }

    /**
     * Redirect to default language.
     *
     * @param array $segments
     *
     * @return RedirectResponse
     */
    protected function redirectTo(array $segments): RedirectResponse
    {
        return redirect()->to(implode('/', $segments));
    }
}
