<?php

namespace Saman\BarekatElectronicHealth\App\Models\BaseModel;

use Illuminate\Database\Eloquent\Model;

abstract class ParentModel extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /**
     *
     */
    protected static function boot()
    {
        parent::boot();

        parent::creating(fn(ParentModel $baseModel) => $baseModel->onCreating());
        parent::created(fn(ParentModel $baseModel) => $baseModel->onCreated());
        parent::updating(fn(ParentModel $baseModel) => $baseModel->onUpdating());
        parent::updated(fn(ParentModel $baseModel) => $baseModel->onUpdated());
    }

}