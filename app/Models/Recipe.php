<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Laravel\Scout\Searchable;

class Recipe extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Searchable;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $appends = ['photo'];

    public function detailRecipe()
    {
        return $this->hasMany(Detail_recipe::class, 'recipe_id');
    }

    public function instruction()
    {
        return $this->hasMany(Instruction::class, 'recipe_id');
    }

    public function getPhotoAttribute()
    {
        return $this->getMedia('photo')->first();
    }

    public function getMediaPhoto()
    {
        return $this->media('photo');
    }

    public function toSearchableArray()
    {
        return [
            'nameFood' => $this->nameFood,
        ];
    }
}
