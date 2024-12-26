<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //to get all the category
    public function categoryPost()
    {
        return $this->HasMany(CategoryPost::class);
    }
}
