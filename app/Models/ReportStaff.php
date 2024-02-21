<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportStaff extends Model
{
    use HasFactory;
    public $table = 'report_staffs';
    protected $guarded = ['id'];

    public function staff()
    {
        return $this->belongsTo(User::class);
    }
}
