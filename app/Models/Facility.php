<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Table;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];

    public function tables() : BelongsToMany
    {
        return $this->belongsToMany(Table::class,"facility_tables","facility_id","table_id");
    }
}
