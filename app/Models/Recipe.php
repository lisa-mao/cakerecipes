<?php

namespace App\Models;
use App\Models\Comment;
use Database\Factories\RecipeFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{

    use HasFactory;


    protected $fillable = [
        'title',
        'total_time',
        'description',
        'prep_time',
        'serving',
        'user_id'

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function categories (): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }


}
