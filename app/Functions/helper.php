<?php

namespace App\Functions;
use Illuminate\Support\Str;


class Helper{
    public static function makeSlug($string, $model)
        {
            $slug = Str::slug($string, '-');
            $original_slug = $slug;
            $exists = $model::where('slug', $slug)->first();
            $i = 1;
            while ($exists) {
                $slug = $original_slug . '-' . $i;
                $exists = $model::where('slug', $slug)->first();
                $i++;
            }
            return $slug;
        }

}

