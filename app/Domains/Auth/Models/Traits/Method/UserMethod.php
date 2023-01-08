<?php

namespace App\Domains\Auth\Models\Traits\Method;

use Illuminate\Support\Collection;

/**
 * Trait UserMethod.
 */
trait UserMethod
{
    /**
     * @return bool
     */
    public function isMasterAdmin(): bool
    {
        return $this->id === 1;
    }

    /**
     * @return mixed
     */
    public function isAdmin(): bool
    {
        return $this->type === self::TYPE_ADMIN;
    }

    /**
     * @return mixed
     */
    public function isUser(): bool
    {
        return $this->type === self::TYPE_USER;
    }

    /**
     * @return mixed
     */
    public function hasAllAccess(): bool
    {
        return $this->isAdmin() && $this->hasRole(config('boilerplate.access.role.admin'));
    }

    /**
     * @param $type
     * @return bool
     */
    public function isType($type): bool
    {
        return $this->type === $type;
    }

    /**
     * @return mixed
     */
    public function canChangeEmail(): bool
    {
        return config('boilerplate.access.user.change_email');
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @return bool
     */
    public function isVerified(): bool
    {
        return $this->email_verified_at !== null;
    }

    /**
     * @return bool
     */
    public function isSocial(): bool
    {
        return $this->provider && $this->provider_id;
    }

    /**
     * @return Collection
     */
    public function getPermissionDescriptions(): Collection
    {
        return $this->permissions->pluck('description');
    }

    /**
     * @param bool $size
     * @return mixed|string
     *
     * @throws \Creativeorange\Gravatar\Exceptions\InvalidEmailException
     */
    public function getAvatar($size = null)
    {
        return 'https://gravatar.com/avatar/' . md5(strtolower(trim($this->email))) . '?s=' . config('boilerplate.avatar.size', $size) . '&d=mp';
    }

    public function hasGroup(): bool
    {
        return $this->groups()->exists();
    }

    public function isSetup(): bool
    {
        return $this->is_setup_complete;
    }

    public function isMale(): bool
    {
        return $this->gender === self::GENDER_MALE;
    }

    public function isFemale(): bool
    {
        return $this->gender === self::GENDER_FEMALE;
    }

    public function getBmi(): ?float
    {
        if (($this->height && $this->weight) == null) return null;
        $height = $this->height / 100;
        return round($this->weight / ($height * $height), 2);
    }

    public function getBmr(): ?float
    {
        if (($this->height && $this->weight) == null) return null;
        $sex = self::isMale() ? 5 : -161;
        return round(10 * $this->weight + 6.25 * $this->height - 5 * $this->age + $sex, 2);
    }

    public function getTdee()
    {
        return round($this->getBmr() * $this->getActivityFactor());
    }

    public function getTdeeForActivity(string $activity_level): float|int
    {
        return round($this->getBmr() * $this->getActivityFactor($activity_level));
    }

    public function getActivityFactor(string $activity_level = null): float
    {
        $activity_level = $activity_level ?? $this->activity_level;

        $activity_factor = 1.2; // sedentary
        if ($activity_level == "lightly_active") {
            $activity_factor = 1.375;
        } elseif ($activity_level == "moderately_active") {
            $activity_factor = 1.55;
        } elseif ($activity_level == "very_active") {
            $activity_factor = 1.725;
        } elseif ($activity_level == "extra_active") {
            $activity_factor = 1.9;
        }
        return $activity_factor;
    }

    public function getCutCalories(): float
    {
        return $this->tdee * 0.8;
    }

    public function getBulkCalories(): float
    {
        return $this->tdee * 1.1;
    }

}
