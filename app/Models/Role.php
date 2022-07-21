<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'roles';

    protected $fillable = [
        'name', 'description'
    ];

    /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->using(RoleUser::class);
    }

    public function getRoleName()
    {
        return $this->attributes['name'];
    }

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class)->using(TransactionRole::class);
    }
}
