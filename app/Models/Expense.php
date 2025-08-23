<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expenses';

    protected $guarded = [];
    public $timestamps = true;
    public function category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }
}
