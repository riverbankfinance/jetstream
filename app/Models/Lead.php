<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $table ='leads';
    protected $primaryKey = 'id';

    protected $fillable = [
        'fullName',
        'email',
        'phone',
        'loan_type',
        'message',
        'goal',
        'user_id',
    ];
    //A lead belongs to a user
    public function lead()
    {
        return $this->belongsTo(User::class);
    }
}
