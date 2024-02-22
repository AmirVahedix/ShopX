<?php

namespace Modules\Category\Models;

use App\Traits\HasOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Database\factories\CategoryFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasOrder;

    protected $fillable = [
        "title",
        "parent_id",
    ];

    protected static function newFactory()
    {
        return CategoryFactory::new();
    }

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function directChildren()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->directChildren()->with('children');
    }
}
