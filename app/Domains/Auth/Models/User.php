<?php

namespace App\Domains\Auth\Models;

use App\Domains\Auth\Models\Traits\Attribute\UserAttribute;
use App\Domains\Auth\Models\Traits\HasProfilePhoto;
use App\Domains\Auth\Models\Traits\Method\UserMethod;
use App\Domains\Auth\Models\Traits\Relationship\UserRelationship;
use App\Domains\Auth\Models\Traits\Scope\UserScope;
use App\Domains\Auth\Notifications\Frontend\ResetPasswordNotification;
use App\Domains\Auth\Notifications\Frontend\VerifyEmail;
use App\Models\Invitation;
use Database\Factories\UserFactory;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;
use Laragear\TwoFactor\Contracts\TwoFactorAuthenticatable;
use Laragear\TwoFactor\TwoFactorAuthentication;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 */
class User extends Authenticatable implements MustVerifyEmail, TwoFactorAuthenticatable
{
    use HasApiTokens,
        HasFactory,
        HasRoles,
        Impersonate,
        MustVerifyEmailTrait,
        Notifiable,
        TwoFactorAuthentication,
        UserAttribute,
        UserMethod,
        UserRelationship,
        UserScope,
        HasProfilePhoto;


    public const TYPE_ADMIN = 'admin';
    public const TYPE_USER = 'user';
    public const GENDER_MALE = 'male';
    public const GENDER_FEMALE = 'female';
    public const GENDER_OTHER = '?';


    public const OMNIVORE = 'omnivore';
    public const VEGETARIAN = 'vegetarian';
    public const VEGAN = 'vegan';

    public static array $gender = [self::GENDER_MALE, self::GENDER_FEMALE];
    public static array $eatTypes = [self::OMNIVORE, self::VEGETARIAN, self::VEGAN];
    public static array $program = ['cut', 'maintain', 'bulk'];
    public static array $activityLevel = ['sedentary', 'lightly_active', 'moderately_active', 'very_active', 'extra_active'];
    /** The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'first_name', 'last_name', 'phone', 'email', 'gender', 'eat_type', 'program', 'activity_level', 'age', 'weight', 'height', 'bmi', 'bmr', 'email_verified_at', 'password', 'password_changed_at', 'active', 'timezone', 'last_login_at', 'last_login_ip', 'to_be_logged_out', 'profile_photo_path', 'facebook', 'twitter', 'instagram', 'telegram', 'remember_token', 'two_factor_secret', 'two_factor_recovery_codes', 'two_factor_confirmed_at', 'is_setup_complete', 'is_allergens'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'last_login_at',
        'email_verified_at',
        'password_changed_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
        'last_login_at' => 'datetime',
        'email_verified_at' => 'datetime',
        'to_be_logged_out' => 'boolean',
        'weight' => 'float',
        'height' => 'float'
    ];

    /**
     * @var array
     */
    protected $appends = [
        'avatar',
    ];

    /**
     * @var string[]
     */
    protected $with = [
        'permissions',
        'roles',
        'groups'
    ];

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Send the registration verification email.
     */
    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new VerifyEmail);
    }

    public function sendInvitation($groupId): void
    {
        $invitation = Invitation::whereNull('registered_at')->firstOrCreate(['group_id' => $groupId, 'user_id' => auth()->user()->id, 'email' => $this->email]);
        $invitation->generateInvitationToken();
        $invitation->save();
    }

    /**
     * Return true or false if the user can impersonate an other user.
     *
     * @param void
     * @return bool
     */
    public function canImpersonate(): bool
    {
        return $this->can('admin.access.user.impersonate');
    }

    /**
     * Return true or false if the user can be impersonate.
     *
     * @param void
     * @return bool
     */
    public function canBeImpersonated(): bool
    {
        return !$this->isMasterAdmin();
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return UserFactory::new();
    }
}
