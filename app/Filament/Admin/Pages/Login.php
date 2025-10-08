<?php

namespace App\Filament\Admin\Pages;

use Filament\Schemas\Schema;
use Filament\View\PanelsRenderHook;
use Filament\Auth\Pages\Login as BaseLogin;
use Filament\Schemas\Components\RenderHook;

class Login extends BaseLogin
{
    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([
                RenderHook::make(PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE),
//                $this->getFormContentComponent(),
//                $this->getMultiFactorChallengeFormContentComponent(),
                RenderHook::make(PanelsRenderHook::AUTH_LOGIN_FORM_AFTER),
            ]);
    }
}
