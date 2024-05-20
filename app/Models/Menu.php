<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug'];

    public function items(): HasMany
    {
        return $this->hasMany('App\Models\MenuItem')->where('parent_id',null);
    }
}
