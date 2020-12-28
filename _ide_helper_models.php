<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\GridList
 *
 * @property int $id
 * @property string $uuid
 * @property int $user_id
 * @property string $title
 * @property int $rows
 * @property int $cols
 * @property array $map
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GridListItem[] $items
 * @property-read int|null $items_count
 * @method static \Illuminate\Database\Eloquent\Builder|GridList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GridList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GridList query()
 * @method static \Illuminate\Database\Eloquent\Builder|GridList whereCols($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GridList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GridList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GridList whereMap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GridList whereRows($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GridList whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GridList whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GridList whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GridList whereUuid($value)
 */
	class GridList extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GridListItem
 *
 * @property int $id
 * @property string $uuid
 * @property int $grid_list_id
 * @property string $title
 * @property int $complete
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\GridList|null $list
 * @method static \Illuminate\Database\Eloquent\Builder|GridListItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GridListItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GridListItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|GridListItem whereComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GridListItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GridListItem whereGridListId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GridListItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GridListItem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GridListItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GridListItem whereUuid($value)
 */
	class GridListItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

