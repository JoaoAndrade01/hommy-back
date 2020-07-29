<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Republic;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function republics()
    {
        return $this->hasMany("app\Republic");
    }
    public function republic()
    {
        return $this->belongsTo('App\Republic');
    }
    public function favoritas()
    {
        return $this->belongsToMany('App\Republic');
    }

    public function createUser(Request $request)
    {
        $this->nickname = $request->nickname;
        $this->name = $request->name;
        $this->cpf = $request->cpf;
        $this->email = $request->email;
        $this->password = $request->password;
        $this->save();
    }
    public function updateUser(Request $request)
    {
        if ($request->nickname) {
            $this->nickname = $request->nickname;
        }
        if ($request->name) {
            $this->name = $request->name;
        }
        if ($request->cpf) {
            $this->cpf = $request->cpf;
        }
        if ($request->email) {
            $this->email = $request->email;
        }
        if ($request->password) {
            $this->password = $request->password;
        }
        $this->save();
    }
    public function alugar($republic_id)
    {
        $republic = Republic::findOrFail($republic_id);
        $this->republic_id = $republic_id;
        $this->save();
    }
    /*public function visualizeRepublic($republic_id)
    {
        $republic = Republic::findOrFail($republic_id);
        $this->user_id = $republic_id;
    }*/

    public function desapropriar($republic_id)
    {
        $republic = Republic::findOrFail($republic_id);
        $this->republic_id = NULL;
        $this->save();
    }
    public function favoritar($republic_id)
    {
        $republic = Republic::findOrFail($republic_id);
        $this->favoritas()->attach($republic_id);
    }
    public function desfavoritar($republic_id)
    {
        $republic = Republic::findOrFail($republic_id);
        $this->favoritas()->detach($republic_id);
    }
}
