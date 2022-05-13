<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermTranslations extends BaseTranslationModel
{
    use HasFactory;

    /** @var string */
    protected $table = 'term_translations';

    /** @var string[] */
    protected $fillable = [
        'content',
    ];
}
