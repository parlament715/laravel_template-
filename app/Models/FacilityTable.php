<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\FacilityTable
 *
 * @property int $table_id
 * @property int $facility_id
 * @property-read \App\Models\Facility|null $facility
 * @property-read \App\Models\Table $table
 * @method static \Illuminate\Database\Eloquent\Builder|FacilityTable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FacilityTable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FacilityTable query()
 * @method static \Illuminate\Database\Eloquent\Builder|FacilityTable whereFacilityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FacilityTable whereTableId($value)
 * @mixin \Eloquent
 */
class FacilityTable extends Model
{
    /**
     * @var string
     */
    protected $table = 'facility_table';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'table_id',     // ID связанного стола из таблицы tables
        'facility_id'     // ID удобства из таблицы facilities
    ];

    public function facility(): BelongsTo
    {
        return $this->belongsTo(Facility::class, 'facility_id', 'id');
    }

    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class, 'table_id', 'id');
    }
}
