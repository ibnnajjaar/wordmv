<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Support\Enums\UserStatus;
use Spatie\Permission\Traits\HasRoles;
use App\Support\Traits\HasActivityLogs;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Notifications\Notifiable;
use App\Filament\Admin\Resources\Users\UserResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasAvatar
{
    use HasActivityLogs;
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $attributes = [
        'status' => UserStatus::Active,
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => UserStatus::class,
        ];
    }

    public function sendUpdatedPasswordNotification(string $password)
    {
        //
    }

    public function getAdminUrlAttribute(): string
    {
        return UserResource::getUrl('view', ['record' => $this]);
    }

    public function getAdminUrlLabelAttribute()
    {
        return $this->name;
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return "https://avatars.laravel.cloud/" . $this->email;
    }
}
