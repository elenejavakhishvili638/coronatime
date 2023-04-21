<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CovidData extends Model
{
    use HasFactory;

    use HasTranslations;

    public $translatable = ['name'];

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        // if ($filters['search'] ?? false) {
        // $search = request('search');
        // $lang = session('locale', 'en');

        // if ($lang === 'ka') {
        //     $query->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(name, '$.ka')) LIKE ?", ['%' . $search . '%']);
        // } else {
        //     $query->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.en'))) LIKE ?", ['%' . strtolower($search) . '%']);
        // }
        // }
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $search = request('search');
            $lang = session('locale', 'en');

            if ($lang === 'ka') {
                $query->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(name, '$.ka')) LIKE ?", ['%' . $search . '%']);
            } else {
                $query->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.en'))) LIKE ?", ['%' . strtolower($search) . '%']);
            }
        });
    }
}
