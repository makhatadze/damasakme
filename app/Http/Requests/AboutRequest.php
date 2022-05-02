<?php
/**
 *  app/Http/Requests/AboutRequest.php
 *
 * Date-Time: 02.05.22
 * Time: 06:58
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Requests;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $defaultLocale = Language::where('default',true)->firstOrFail();

        return [
            $defaultLocale->locale.'' => 'required|array',
            $defaultLocale->locale.'.content_1' => 'required|string',
            $defaultLocale->locale.'.content_2' => 'required|string',
//            'content_1_image' => 'required',
//            'content_2_image' => 'required'
        ];
    }
}
