<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class ResetPassword extends Model
{
    use HasFactory;

    protected $guarded =[];
    public $timestamps = false;
    protected $table = 'reset_password';
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
