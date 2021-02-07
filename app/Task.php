<?php



namespace App;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'start', 'description', 'image', 'serial_number','image'
    ];
    public function Users()
    {
        return $this->belongsTo('App\User');
    }

}
