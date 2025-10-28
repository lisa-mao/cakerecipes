<?php

namespace App\Models;

use database\factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    /** @use HasFactory<CategoryFactory> */
    use HasFactory, Notifiable;
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }


}
