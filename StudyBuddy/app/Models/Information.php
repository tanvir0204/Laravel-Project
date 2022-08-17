<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $table = 'informations';
    
    protected $fillable = ['g_name', 'g_phone', 'phone', 'location', 'gender', 's_institute', 's_group', 's_result', 's_year', 's_curriculum', 'h_institute', 'h_group', 'h_result', 'h_year', 'h_curriculum', 'u_institute', 'u_major', 'u_sem', 'u_result', 'u_year', 'u_type', 'user_id'];


    /* Relationship with User */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
