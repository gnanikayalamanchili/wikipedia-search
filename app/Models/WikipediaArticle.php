<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WikipediaArticle extends Model
{
    /** @use HasFactory<\Database\Factories\WikipediaArticleFactory> */
    use HasFactory;

    use Searchable;

    protected $fillable = [
        'title',
        'body',
        'references',
        'categories',
        'infobox',
        'url'
    ];

    protected $casts = [
        'references' => 'array',
        'categories' => 'array',
        'infobox' => 'array'
    ];

    public function searchableAs()
    {
        return 'wikipedia_articles_index';
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'categories' => implode(' ', $this->categories ?? []),
        ];
    }
}
