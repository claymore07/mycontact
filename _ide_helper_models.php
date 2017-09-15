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
 * App\Contacts
 *
 * @property int $id
 * @property string $name
 * @property int $group_id
 * @property string $company
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Groups $group
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacts whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacts whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacts whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacts whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacts whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacts wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Contacts whereUpdatedAt($value)
 */
	class Contacts extends \Eloquent {}
}

namespace App{
/**
 * App\Groups
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Contacts[] $contacts
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Groups whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Groups whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Groups whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Groups whereUpdatedAt($value)
 */
	class Groups extends \Eloquent {}
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

