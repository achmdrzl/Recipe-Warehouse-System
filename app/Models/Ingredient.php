<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Ingredient extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function detailIngredient()
    {
        return $this->hasMany(Detail_recipe::class, 'ingredient_id');
    }
    
    public function toSearchableArray()
    {
        return [
            'item' => $this->item,
        ];
    }

}
