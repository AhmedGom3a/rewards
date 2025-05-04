<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reward extends Model
{
    use HasFactory;
    use Searchable;

    public function toSearchableArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
        ];
    }

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];
}
