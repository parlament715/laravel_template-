<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TableStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use phpDocumentor\Reflection\Types\Collection;

/**
 * App\Models\Table
 *
 * @property int $id
 * @property int $table_number
 * @property TableStatus $status
 * @property int $number_of_seats
 * @property int $branch_id
 * @property-read \App\Models\Branch|null $branches
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Facility> $facility
 * @property-read int|null $facility_count
 * @method static \Database\Factories\TableFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Table newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Table newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Table query()
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereNumberOfSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereTableNumber($value)
 * @mixin \Eloquent
 */
class Table extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "table_number",
        "status",
        "number_of_seats",
        "branch_id"
    ];
    protected $casts = [
        'status' => TableStatus::class,
    ];

    public function branches(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function facility(): BelongsToMany
    {
        return $this->belongsToMany(Facility::class, "facility_table", "table_id", "facility_id");
    }


}
