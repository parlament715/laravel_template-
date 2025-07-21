<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Table;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Branch
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Table> $tables
 * @property-read int|null $tables_count
 * @method static \Database\Factories\BranchFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Branch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch query()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereName($value)
 * @mixin \Eloquent
 */
class Branch extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "name",
        "address"
    ];

    public function table(): HasMany
    {
        return $this->hasMany(Table::class);
    }
}
