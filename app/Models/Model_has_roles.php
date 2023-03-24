<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_has_roles extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'model_id',
    ];

    public function obteneroles()
    {
        return Model_has_roles::all();
    }

    public function obtenerolID($id)
    {

        return Model_has_roles::where('model_id', $id)->get();
    }
    public function deleterol($id)
    {

        $RolesUsuarios = $this->obtenerolID($id);
        foreach ($RolesUsuarios as $RolUsuario) {
            $RolUsuario->where('model_id', $id)->delete();
        }
    }
}
