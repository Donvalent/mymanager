<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'salary'
    ];

    /**
     * Relation to User
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Position::class, 'id', 'id');
    }
}
