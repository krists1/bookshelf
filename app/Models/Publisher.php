<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;


class Publisher extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'founded',
        'active',
        'country'
    ];

    public static function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'founded' => 'required|integer|max:'.date('Y').'|min:1500',
            'country' => [
                'required',
                Rule::in(['Latvija', 'Igaunija', 'Lietuva', 'ASV'])
            ],
            'active' => 'boolean'
        ];
    }
}
