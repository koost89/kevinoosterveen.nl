<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Collection;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, Searchable;

    protected $casts = [
        'published' => 'boolean',
    ];

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published', true);
    }

    public function scopeFilter(Builder $query, Collection $searchFields)
    {
        return $query
            ->when($searchFields->has('tag'), fn (Builder $q) => $q->whereRelation('tags', 'name', $searchFields->get('tag')))
            ->when($searchFields->has('q'), fn (Builder $q) => $q->where('title', 'LIKE', "%{$searchFields->get('q')}%"));
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function shouldBeSearchable(): bool
    {
        return $this->published === true;
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'text' => $this->text,
            'external_url' => $this->external_url
        ];
    }
}
