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
        'birthday',
        'fullNameCoborrower',
        'birthdayCoborrower',
        'emailCoborrower',
        'phoneCoborrower',
        'address',
        'city',
        'state',
        'zip',
        'email',
        'phone',
        'loan_type',
        'message',
        'url',
        'ip',
        'referringUrl',
        'agent',
        'status',
        'goal',
        'closed',
        'noText',
        'rating',
        'floifyLoan',
        'credit',
        'user_id',
    ];
    //A lead belongs to a user
    public function lead()
    {
        return $this->belongsTo(User::class);
    }
}
