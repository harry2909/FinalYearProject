<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int $int)
 * @method static find(int $id)
 * @method static first()
 */
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
