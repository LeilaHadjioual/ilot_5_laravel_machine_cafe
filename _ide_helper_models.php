<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Boisson
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Ingredient[] $ingredients
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Recipe[] $recipes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Sale[] $sales
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Boisson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Boisson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Boisson whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Boisson wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Boisson whereUpdatedAt($value)
 */
	class Boisson extends \Eloquent {}
}

namespace App{
/**
 * App\Ingredient
 *
 * @property int $id
 * @property string $name
 * @property int $amount
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Boisson[] $boisson
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Recipe[] $recipes
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ingredient whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ingredient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ingredient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ingredient whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ingredient whereUpdatedAt($value)
 */
	class Ingredient extends \Eloquent {}
}

namespace App{
/**
 * App\Sale
 *
 * @property int $id
 * @property int $boisson_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Boisson $boisson
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sale whereBoissonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sale whereUpdatedAt($value)
 */
	class Sale extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

