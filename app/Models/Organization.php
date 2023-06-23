<?php

namespace App\Models;

use Database\Factories\OrganizationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $title
 * @property boolean $available
 *
 * @property-read User[] $users
 *
 * @method static OrganizationFactory factory($count = null, $state = [])
 */
class Organization extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'title',
        'available'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
