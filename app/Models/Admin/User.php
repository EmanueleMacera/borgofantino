<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Constant that defines the generic section name.
     *
     * @var string
     */
    const ROLE_SUPER_PROGRAMMER = 'super-programmer';
    const ROLE_PROGRAMMER = 'programmer';
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';

    /**
     * Get the role level of the user.
     *
     * @var array
     */
    const ROLE_LEVELS = [
        self::ROLE_USER => 1,
        self::ROLE_ADMIN => 2,
        self::ROLE_PROGRAMMER => 3,
        self::ROLE_SUPER_PROGRAMMER => 4,
    ];

    // Mass assignable attributes
    protected $fillable = ['name', 'email', 'password', 'role', 'is_approved'];

    // Hidden attributes for arrays
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the role level of the user.
     *
     * @return int
     */
    public function getRoleLevel(): int
    {
        return self::ROLE_LEVELS[$this->role] ?? 0;
    }

    /**
     * Check if the user is a programmer or higher.
     *
     * @return bool
     */
    public function isProgrammer(): bool
    {
        return $this->getRoleLevel() >= self::ROLE_LEVELS[self::ROLE_PROGRAMMER];
    }

    /**
     * Check if the user is a super programmer.
     *
     * @return bool
     */
    public function isSuperProgrammer(): bool
    {
        return $this->role === self::ROLE_SUPER_PROGRAMMER;
    }

    /**
     * Check if the user can manage another user.
     *
     * @param User $targetUser
     * @return bool
     */
    public function canManage(User $targetUser): bool
    {
        return $this->getRoleLevel() > $targetUser->getRoleLevel();
    }

    /**
     * Check if the user can approve another user.
     *
     * @param User $targetUser
     * @return bool
     */
    public function canApprove(User $targetUser): bool
    {
        return $this->canManage($targetUser);
    }

    /**
     * Check if the user is visible to another user.
     *
     * @param User $viewer
     * @return bool
     */
    public function isVisibleTo(User $viewer): bool
    {
        if ($viewer->isSuperProgrammer()) {
            return true;
        }

        if ($viewer->isProgrammer()) {
            return true;
        }

        return $this->getRoleLevel() <= $viewer->getRoleLevel();
    }

    /**
     * Check if the user has a role.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        if (!array_key_exists($role, self::ROLE_LEVELS)) {
            return false;
        }
        return $this->getRoleLevel() >= self::ROLE_LEVELS[$role];
    }

    /**
     * Check if the user has at least one of the given roles.
     *
     * @param array $roles
     * @return bool
     */
    public function hasAnyRole(array $roles): bool
    {
        if (empty($roles)) {
            return false;
        }

        foreach ($roles as $role) {
            if ($this->hasRole($role)) {
                return true;
            }
        }

        return false;
    }
}
