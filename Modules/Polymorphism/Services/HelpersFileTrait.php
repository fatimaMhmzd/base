<?php

namespace Modules\Polymorphism\Services;

use Illuminate\Support\Facades\Storage;

trait HelpersFileTrait
{
    private static function helperDeleteFiles($links)
    {
        if(is_string($links)){
            $links = [$links];
        }

        foreach ($links as $link){
            $link_ = Storage::path($link);
            unlink($link_);
        }
    }
}
