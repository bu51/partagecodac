<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot(){
        parent::boot();
        self::creating(function ($ad){
            $ad->user()->associate(auth()->user()->id);
            $ad->category()->associate(request()->category);
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
