<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TableStatus;
use App\Models\Branch;
use App\Models\Facility;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        "table_number",
        "status",
        "number_of_seats",
        "branch"
    ];
    protected $casts = [
        'status' => TableStatus::class,
    ];

    public function branches() : BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function facilities() : BelongsToMany
    {
        return $this->belongsToMany(Facility::class,"facility_tables","table_id","facility_id");
    }

}
