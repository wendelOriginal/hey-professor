<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    // @phpstan-ignore-next-line;
    use HasFactory;

    protected function casts(): array
    {
        return  [
            'drash' => 'bool',
        ];
    }

    /**
     * @return HasMany<LikeQuestion, $this>
     */
    public function likeQuestion(): HasMany
    {
        return $this->hasMany(LikeQuestion::class);
    }
}
