<?php

namespace App\Filament\Resources\PenggunaResource\Pages;

use App\Filament\Resources\PenggunaResource;
use Filament\Resources\Pages\Page;

class Login extends Page
{
    protected static string $resource = PenggunaResource::class;

    protected static string $view = 'filament.resources.pengguna-resource.pages.login';
}
