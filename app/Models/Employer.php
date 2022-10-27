<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    protected $fillable = ['name','lastName','email','phone'];

    public function Companies(){
        return $this->belongsTo(Company::class);
    }

}
