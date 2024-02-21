<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportManager extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function manager()
    {
        return $this->belongsTo(User::class);
    }
}
