<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = [
        "label",
        "start_date",
        "start_time",
        "end_date",
        "end_time",
        "tags",
        "description",
        "user_id",
    ];

}
