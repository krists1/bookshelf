<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'description',
        'author_id'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public static function rules(): array
    {
        return [
            'title'=> 'required|string|max:250',
            'author_id' => 'required|exists:authors,id',
            'description' => 'required|string'
        ];
    }
}
