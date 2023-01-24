<?php

namespace Saman\BarekatElectronicHealth\App\Traits;

use \Illuminate\Database\Eloquent\Relations\HasMany;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

trait Tree
{
    /**
     * @return HasMany
     */
    public function childs(): HasMany
    {
        return $this->hasMany($this, 'parent_id');
    }

    /**
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo($this, 'parent_id');
    }

    /**
     * @return HasMany
     */
    public function allChildren(): HasMany
    {
        return $this->hasMany($this, 'parent_id')->with("allchildren");
    }

    /**
     * @return BelongsTo
     */
    public function allparent(): BelongsTo
    {
        return $this->belongsTo($this, 'parent_id')->with('allparent');
    }

    public function mainParent()
    {
        $parents    = $this->allparent()->get()->toArray();
        $mainParent = collect(flatten($parents,'allparent',true))->where('parent_id',null)->first();

        if (count($mainParent)) {
            return $mainParent['id'];
        }

        return null;
    }
}