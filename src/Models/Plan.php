<?php

namespace LucasDotDev\Soulbscription\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LucasDotDev\Soulbscription\Models\Concerns\HandlesRecurrence;

class Plan extends Model
{
    use HandlesRecurrence;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'periodicity_type',
        'periodicity',
    ];

    public function features()
    {
        return $this->belongsToMany(Feature::class)
            ->using(PlanFeature::class)
            ->withPivot(['charges']);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
