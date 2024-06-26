<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','title_tr',
        'seo_title','seo_title_tr',
        'seo_description','seo_description_tr',
        'slug','parent_id','is_visible','image','template_id','content',
    ];

    protected $casts = [
        'content' => 'array'
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Page::class,'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Page::class,'parent_id','id');
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(Template::class);
    }
}
