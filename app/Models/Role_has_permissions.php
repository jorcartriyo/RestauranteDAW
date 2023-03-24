<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class Role_has_permissions extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'permision_id',
        'role_id',
    ];

    public function obtenerPermisos()
    {
        return Role_has_permissions::all();
    }

    public function obtenerPermisoID($id)
    {

        return Role_has_permissions::where('permission_id', $id)->get();
    }
    public function deletePermiso($id)
    {

        $permisos = $this->obtenerPermisoID($id);
        foreach ($permisos as $permiso) {
            $permiso->where('role_id', $id)->delete();
        }
    }
}
