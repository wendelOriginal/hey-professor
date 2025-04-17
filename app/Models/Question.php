<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Question extends Model
{
    // @phpstan-ignore-next-line;
    use HasFactory;

    protected function casts(): array
    {
        return  [
            'draft' => 'bool',
        ];
    }

    /**
     * @return BelongsTo<User, $this>
     */

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * @return HasMany<LikeQuestion, $this>
     */
    public function likeQuestion(): HasMany
    {
        return $this->hasMany(LikeQuestion::class);
    }
}
