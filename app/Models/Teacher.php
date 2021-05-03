<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int $int)
 * @method static find(int $id)
 * @method static first()
 */
class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'teacherid',
        'subject'
    ];

    public function teacherPath()
    {
        return '/teachers/' . $this->id;
    }
}
