<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate()
 * @method static findOrFail(int $id)
 * @method static create(array $all)
 * @method static where(string $string, $get)
 */
class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subjectid'
    ];
}
