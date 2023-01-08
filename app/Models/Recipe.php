<?php

namespace App\Models;

use App\Domains\Auth\Models\Traits\HasImage;
use App\Domains\Auth\Models\User;
use App\Traits\DefaultRelationTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Recipe extends Model
{
    use HasFactory;
    use HasImage;
    use HasSlug;
    use DefaultRelationTrait;

    protected $fillable = ['group_id', 'user_id', 'name', 'slug', 'image', 'description', 'total_time', 'prep_time', 'perform_time', 'cook_time', 'recipe_yield', 'recipeCuisine', 'rating', 'org_url', 'is_ocr_recipe', 'date_added', 'date_updated', 'ingredients', 'instructions', 'properties', 'external_id'];

    protected $casts = [
        'instructions' => 'collection',
        'ingredients' => 'collection',
        'properties' => 'collection'
    ];

    public static function boot()
    {
        parent::boot();

        //while creating/inserting item into db
        static::creating(function ($item) {
            if (empty($item->{$item->getKeyName()})) {
                $item->{$item->getKeyName()} = Uuid::uuid4();
            }
            if (session('group_id')) {
                if ($item->getConnection()
                    ->getSchemaBuilder()
                    ->hasColumn($item->getTable(), 'group_id')) {
                    $item->group_id = session('group_id');

                }
            }
        });

    }

    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }


    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(RecipeComment::class);
    }

    public function userFavourites(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_to_favorites');
    }

    public function currentUserFavourites(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_to_favorites')->where('user_id', auth()->user()->id);
    }

    public function nutrition(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(RecipeNutrition::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
