<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Pengguna extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $primaryKey = 'kode_pengguna';
    public $incrementing = false;

    protected $fillable = [
        'kode_pengguna',
        'Username',
        'password',
        'Role',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function Cart()
    {
        return $this->hasMany(Cart::class, 'kode_pengguna');
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $roles = $data['roles'] ?? [];
        $data['roles_to_assign'] = $roles;
        unset($data['roles']);

        return $data;
    }

    public static function afterCreate($record): void
    {
        $record->syncRoles(request()->input('roles_to_assign'));
    }

    public function username()
    {
        return 'Username'; // agar login pakai kolom Username
    }

    public function getAuthIdentifierName()
    {
        return 'Username';
    }
}
