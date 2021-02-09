<?php



namespace App;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'start', 'description', 'image', 'serial_number','image'
    ];
    public function users()
    {
        return $this->belongsToMany('App\User')
            ->withPivot('image');
    }

}
