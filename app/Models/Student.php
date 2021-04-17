<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'studentid',
        'address',
        'telephone',
        'year'
    ];

    public function path()
    {
        return '/students/' . $this->id;
    }
}
