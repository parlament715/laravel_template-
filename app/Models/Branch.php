<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Table;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "name",
        "address"
    ];

    public function tables(): HasMany
    {
        return $this->hasMany(Table::class);
    }
}
