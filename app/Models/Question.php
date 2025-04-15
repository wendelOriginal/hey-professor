<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    // @phpstan-ignore-next-line;
    use HasFactory;

    /**
     * @return HasMany<LikeQuestion, $this>
     */
    public function likeQuestion(): HasMany
    {
        return $this->hasMany(LikeQuestion::class);
    }

    /**
     * @return Attribute<int, $this>
     */
    public function likes(): Attribute
    {
        return new Attribute(
            get: fn () => $this->likeQuestion()->sum('like')
        );
    }
}
