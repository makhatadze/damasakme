<?php
/**
 *  app/Http/Middleware/HandleInertiaRequests.php
 *
 * Date-Time: 21.04.22
 * Time: 16:35
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */

namespace App\Http\Middleware;

use App\Models\Language;
use App\Models\LanguageLine;
use App\Models\Social;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }


    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return string
     */
    public function rootView(Request $request): string
    {
        if (str_contains($request->route()->getPrefix(), config('admin.prefix'))) {
            return 'admin';
        }
        return 'app';
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'flash' => [
                'type' => $request->session()->get('type'),
                'message' => $request->session()->get('message'),
            ],
            'locale' => function () {
                return app()->getLocale();
            },
            'locales' => $this->getLocales(),
            'localizations' => $this->languageItems(),
            'social' => Social::first()
        ]);
    }


    /**
     * @return array
     */
    public function languageItems(): array
    {
        $localizations = Language::where('status', true)->get();
        $languages = [];
        $languages['data'] = [];
        if (count($localizations) > 0) {
            foreach ($localizations as $localization) {
                if ($this->isCurrent($localization->locale)) {
                    $languages['current'] = [
                        'title' => $localization->title,
                        'url' => '',
                        'locale' => $localization->locale
                    ];
                    continue;
                }
                $languages['data'][] = [
                    'title' => $localization->title,
                    'url' => $this->getUrl($localization->locale),
                    'locale' => $localization->locale
                ];
            }
        }
        return $languages;
    }

    /**
     * @param string $lang
     *
     * @return bool
     */
    protected function isCurrent(string $lang): bool
    {
        return app()->getLocale() === $lang;
    }

    /**
     * @param $lang
     *
     * @return string
     */
    protected function getUrl($lang): string
    {

        $host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

        $uriSegments[1] = $lang;

        $uriSegments = implode('/', $uriSegments);
        return $host . $uriSegments;
    }

    /**
     * @return array
     */
    protected function getLocales(): array
    {
        return Language::where('status', true)->orderBy('default', 'desc')->pluck('locale')->toArray() ?? [];
    }
}
