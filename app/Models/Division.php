<?php

namespace App\Models;

use App\Models\Scopes\OrganizationScope;
use Database\Factories\DivisionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $organization_id
 * @property boolean $available
 *
 * @property-read Organization $organization
 *
 * @method static DivisionFactory factory($count = null, $state = [])
 */
class Division extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'organization_id',
        'available'
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(new OrganizationScope());

        static::creating(function ($model) {
            $user = auth()->user();
            if ($user) {
                $model->organization_id = $user->organization_id;
            }
        });
    }

    public function organization():  BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }
}
