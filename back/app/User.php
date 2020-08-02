<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\HasApiTokens;
use App\Republic;
use App\Comment;
Use Illuminate\Database
\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;
    use SoftDeletes;
    

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
        return $this->hasMany('App\Republic');
    }
    public function republic()
    {
        return $this->belongsTo('App\Republic');
    }
    public function favoritas()
    {
        return $this->belongsToMany('App\Republic');
    }
    public function Comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function createUser(UserRequest $request)
    {
        $this->nickname = $request->nickname;
        $this->name = $request->name;
        $this->cpf = $request->cpf;
        $this->email = $request->email;
        $this->password = bcrypt($request->password);
        $this->save();
    }
    public function updateUser(UserRequest $request)
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
            $this->password = bcrypt($request->password);
        }
        $this->save();
    }
    public function alugar($republic_id)
    {
        $republic = Republic::findOrFail($republic_id);
        $this->republic_id = $republic_id;
        $this->save();
    }
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
