<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\RepublicRequest;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;




class Republic extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function userLocatario()
    {
        return $this->hasOne('App\User');
    }
    public function userFavoritas()
    {
        return $this->belongsToMany('App\User');
    }
    public function Comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function createRepublic(RepublicRequest $request)
    {
        $this->name = $request->name;
        $this->street = $request->street;
        $this->number = $request->number;
        $this->neighborhood = $request->neighborhood;
        $this->city = $request->city;
        $this->state = $request->state;
        $this->size = $request->size;
        $this->bedrooms = $request->bedrooms;
        $this->livingRoom = $request->livingRoom;
        $this->bathrooms = $request->bathrooms;
        $this->kitchens = $request->kitchens;
        $this->garages = $request->garages;
        $this->save();
    }
    public function updateRepublic(RepublicRequest $request)
    {
        if ($request->name) {
            $this->name = $request->name;
        }
        if ($request->street) {
            $this->street = $request->street;
        }
        if ($request->neighborhood) {
            $this->neighborhood = $request->neighborhood;
        }
        if ($request->city) {
            $this->city = $request->city;
        }
        if ($request->state) {
            $this->state = $request->state;
        }
        if ($request->size) {
            $this->size = $request->size;
        }
        if ($request->bedrooms) {
            $this->bedrooms = $request->bedrooms;
        }
        if ($request->livingRoom) {
            $this->livingRoom = $request->livingRoom;
        }
        if ($request->bathrooms) {
            $this->bathrooms = $request->bathroom;
        }
        if ($request->kitchens) {
            $this->kitchens = $request->kitchens;
        }
        if ($request->garages) {
            $this->garages = $request->garages;
        }
        $this->save();
    }
    public function anunciar($user_id)
    {
        $user = User::findOrFail($user_id);
        $this->user_id = $user_id;
        $this->save();
    } 
}
