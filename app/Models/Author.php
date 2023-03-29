<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/** @mixin /Eloquent */
class Author extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'surname',
        'is_latvian'
    ];

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->name . ' ' . $this->surname,
        );
    }

    public static function rules() : array
    {
        return [
            'name' => 'required|string',
            'surname' => 'required|string',
            'is_latvian' => 'boolean'
        ];
    }
}
