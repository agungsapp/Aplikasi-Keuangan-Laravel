<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QtyModel extends Model
{
    use HasFactory;
    protected $table = 'qty';
    protected $guarded = ['id'];
    public $incrementing = true;
}
