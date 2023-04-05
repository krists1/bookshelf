<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'grade',
        'published',
        'book_id',
        'text'
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'grade' => 'required|integer|min:0|max:10',
            'published' => 'boolean',
            'book_id' => 'required|exists:books,id',
            'text' => 'required|string'
        ];
    }
}
