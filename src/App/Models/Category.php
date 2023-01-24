<?php

namespace Saman\BarekatElectronicHealth\App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;
use Saman\BarekatElectronicHealth\App\Models\BaseModel\ParentModel;
use Saman\BarekatElectronicHealth\App\Traits\Tree;

class Category extends ParentModel
{
    use HasFactory,Tree;

    protected $table = 'categories';

    const COLUMN_ID = 'id';
    const COLUMN_TITLE = 'title';
    const COLUMN_PARENT_ID = 'parent_id';
    const COLUMN_IS_ACTIVE = 'is_active';

    protected $fillable = [
        self::COLUMN_TITLE,
        self::COLUMN_PARENT_ID,
        self::COLUMN_IS_ACTIVE
    ];

    /**
     * @param string $value
     * @return $this
     */
    public function setTitle(string $value): self
    {
        $this->{self::COLUMN_TITLE} = $value;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->{self::COLUMN_TITLE};
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setParentId(int $value): self
    {
        $this->{self::COLUMN_PARENT_ID} = $value;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getParentId(): ?int
    {
        return $this->{self::COLUMN_PARENT_ID};
    }


    public static function getCategories()
    {
        return self::query()
            ->select(
                self::COLUMN_TITLE,
                self::COLUMN_PARENT_ID,
                self::COLUMN_IS_ACTIVE
            )
            ->whereHas('activeCategory');
    }
    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeActiveCategory(Builder $builder): Builder
    {
        return $builder->where(self::COLUMN_IS_ACTIVE,1);
    }

    public function onCreating()
    {
        //
    }

    public function onCreated()
    {
        //
    }

    public function onUpdating()
    {
        //
    }

    public function onUpdated()
    {
        //
    }
}