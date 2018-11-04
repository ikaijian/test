<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Test extends Model
{
    use Notifiable;
    public $fillable = ['name', 'sex', 'age'];

    public function scopeName($query)
    {
        $obj=request()->input('name');
        if(isset($obj)){
            $query=$query->where('name','like' ,'%'.$obj.'%');
        }
        return $query;
    }

    public function scopeSex($query)
    {
        $obj=request()->input('sex');
        if(isset($obj)){
            $query=$query->where('sex',$obj);
        }
        return $query;
    }
}
