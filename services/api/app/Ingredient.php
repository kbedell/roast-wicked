<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }

    public function getIngredients($ingredients) 
    {
        $ingredient_list = [];

        preg_match("/(.+)+/", $ingredients, $split_ingredients);

        foreach ($split_ingredients as $ingredient) {
            
        }
    }
}
