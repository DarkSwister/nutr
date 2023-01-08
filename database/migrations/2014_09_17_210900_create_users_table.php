<?php

use App\Domains\Auth\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('type', [User::TYPE_ADMIN, User::TYPE_USER])->default(User::TYPE_USER);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->enum('gender', [User::GENDER_MALE, User::GENDER_FEMALE, User::GENDER_OTHER])->nullable();
            $table->enum('eat_type', [User::OMNIVORE, User::VEGETARIAN, User::VEGAN])->default(User::OMNIVORE);
            $table->enum('program', User::$program)->nullable();
            $table->enum('activity_level', User::$activityLevel)->nullable();
            $table->unsignedInteger('age')->nullable();
            $table->unsignedDecimal('weight')->nullable();
            $table->unsignedDecimal('height')->nullable();
            $table->unsignedDecimal('bmi')->nullable();
            $table->unsignedDecimal('bmr')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->timestamp('password_changed_at')->nullable();
            $table->unsignedTinyInteger('active')->default(1);
            $table->string('timezone')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->boolean('to_be_logged_out')->default(false);
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();;
            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->boolean('is_setup_complete')->default(false);
            $table->boolean('is_allergens')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('providers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(User::class)->constrained();
            $table->string('avatar')->nullable();
            $table->string('name');
            $table->text('payload');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
