<?php

namespace Modules\Rateing\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Modules\Blog\Entities\Blog;
use Modules\Product\Entities\Product;
use Modules\Rateing\Entities\Rateing;

class RateingService
{
    public static function saveRate(int $rate,Model $model,$relation=null)
    {

        if($rate && filled($rate)){
            $data = [
                'user_id' => Auth::id(),
                'title' =>  null,
                'description' =>  null,
                'rating' => $rate,
            ];
            if($relation and method_exists($model, $relation)){
                $model->$relation()->create($data);
            }
            elseif (method_exists($model, 'rate')) {
                $model->rate()->create($data);
            }
            $count =  $model->rate()->count();
            $sumRating =  $model->rate()->get()->sum('rating');
           $avg_rate = ($sumRating /$count);
           return $model->find($model->id)->update(['avg_rate'=>$avg_rate]);
        }
    }
}
