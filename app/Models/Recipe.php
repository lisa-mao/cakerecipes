<?php

namespace App\Models;

use Database\Factories\RecipeFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
//use App\Models\HasFactory;

class Recipe extends Model
{
//    /** @use HasFactory<RecipeFactory> */
//    use HasFactory, Notifiable;


    protected $fillable = [
        'title',
        'total_time',
        'description',
        'prep_time',
        'serving',
        'category',

    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function categories ()
    {
        return $this->belongsToMany(Category::class);
    }


}
