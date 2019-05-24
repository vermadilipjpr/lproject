<?php
namespace App\AdminModels;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class State extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'state_name'
    ];
}
