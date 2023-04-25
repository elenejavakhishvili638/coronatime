<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDO;
use Spatie\Translatable\HasTranslations;

class CovidData extends Model
{
    use HasFactory;

    use HasTranslations;

    public $translatable = ['name'];

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function ($query, $search) {
            $search = request('search');
            $lang = session('locale', 'en');
            if ($search) {
                if ($lang === 'ka') {
                    $query->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(name, '$.ka')) LIKE ?", ['%' . $search . '%']);
                } else {
                    $query->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.en'))) LIKE ?", ['%' . strtolower($search) . '%']);
                }
            }
        });

        $lang = session('locale', 'en');
        $sortBy = request('sort_by', 'name');
        $sortOrder = request('sort_order', 'asc');

        $query->when($sortBy === 'name', function ($query) use ($lang, $sortOrder) {
            $jsonPath = $lang === 'ka' ? '$.ka' : '$.en';
            $query->orderByRaw("JSON_UNQUOTE(JSON_EXTRACT(name, ?)) $sortOrder", [$jsonPath]);
        })->when($sortBy === 'confirmed', function ($query) use ($sortOrder) {
            $query->orderBy('confirmed', $sortOrder);
        })->when($sortBy === 'recovered', function ($query) use ($sortOrder) {
            $query->orderBy('recovered', $sortOrder);
        })->when($sortBy === 'deaths', function ($query) use ($sortOrder) {
            $query->orderBy('deaths', $sortOrder);
        });

        // $connectionType = DB::connection()->getPdo()->getAttribute(PDO::ATTR_DRIVER_NAME);

        // $query->when($filters['search'] ?? false, function ($query) use ($connectionType) {
        //     $search = request('search');
        //     $lang = session('locale', 'en');
        //     if ($search) {
        //         if ($connectionType === 'mysql') {
        //             if ($lang === 'ka') {
        //                 $query->whereRaw("JSON_UNQUOTE(JSON_EXTRACT(name, '$.ka')) LIKE ?", ['%' . $search . '%']);
        //             } else {
        //                 $query->whereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(name, '$.en'))) LIKE ?", ['%' . strtolower($search) . '%']);
        //             }
        //         } else {
        //             $query->where('name', 'LIKE', '%' . $search . '%');
        //         }
        //     }
        // });

        // $lang = session('locale', 'en');
        // $sortBy = request('sort_by', 'name');
        // $sortOrder = request('sort_order', 'asc');

        // $query->when($sortBy === 'name', function ($query) use ($lang, $sortOrder, $connectionType) {
        //     if ($connectionType === 'mysql') {
        //         $jsonPath = $lang === 'ka' ? '$.ka' : '$.en';
        //         $query->orderByRaw("JSON_UNQUOTE(JSON_EXTRACT(name, ?)) $sortOrder", [$jsonPath]);
        //     } else {
        //         $query->orderBy('name', $sortOrder);
        //     }
        // })->when($sortBy === 'confirmed', function ($query) use ($sortOrder) {
        //     $query->orderBy('confirmed', $sortOrder);
        // })->when($sortBy === 'recovered', function ($query) use ($sortOrder) {
        //     $query->orderBy('recovered', $sortOrder);
        // })->when($sortBy === 'deaths', function ($query) use ($sortOrder) {
        //     $query->orderBy('deaths', $sortOrder);
        // });
    }
}
