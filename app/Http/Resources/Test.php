<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Test extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sex' => $this->sex,
            'age'=>$this->age,
        ];
    }

    public function with($request)
    {
        return[
            'message'=>'success',
            'status_code'=>'200'
        ];
    }
}
