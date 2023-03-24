<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;




class Permissions extends Model
{
    use HasFactory, HasRoles, HasPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'guard_name',
        'created_at',
        'updated_at'
    ];
    public $guard_name = 'web';
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    public function obtenerPermisos()
    {
        return Permissions::all();
    }
    public function obtenerPermisolID($id)
    {
        return Permissions::find($id);
    }
    public function obtenerPermisoNombre($id)
    {
        return
            User::select('name')->find($id);
        //$RolUsuario->where('model_id', $id)->delete();
    }
    public function deletePermiso($id)
    {

        $permiso = Permissions::find($id);
        $permiso->delete();
    }
    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'role_has_permissions', 'permission_id', 'role_id');
    }
}
