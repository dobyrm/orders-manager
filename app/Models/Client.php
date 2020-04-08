<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the orders for the client.
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'client_id', 'id');
    }
}
