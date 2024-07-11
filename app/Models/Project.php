<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use TCG\Voyager\Models\Category;

class Project extends Model
{
    use HasFactory;

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function scopePublished(Builder $builder): Builder
    {
        return $builder->where('status', 'published');
    }

    public function scopeRecent(Builder $builder): Builder
    {
        return $builder->orderBy('created_at', 'desc');
    }

}
