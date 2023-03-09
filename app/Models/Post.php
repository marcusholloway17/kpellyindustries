<?php

/*
 * This file is auto generated using the Drewlabs Code Generator package (v2.3)
 *
 * (c) Sidoine Azandrew <contact@liksoft.tg>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

namespace App\Models;

use Drewlabs\Packages\Database\Traits\Model;
use Drewlabs\Packages\Database\Contracts\ORMModel;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Post extends EloquentModel implements ORMModel
{

	use Model;

	/**
	 * Model referenced table
	 * 
	 * @var string
	 */
	protected $table = 'posts';

	/**
	 * List of values that must be hidden when generating the json output
	 * 
	 * @var array
	 */
	protected $hidden = [];

	/**
	 * List of attributes that will be appended to the json output of the model
	 * 
	 * @var array
	 */
	protected $appends = [];

	/**
	 * List of fillable properties of the current model
	 * 
	 * @var array
	 */
	protected $fillable = [
		'id',
		'slug',
		'title',
		'description',
		'categoryId',
		'parentId',
		'isPublished',
		'publishedAt',
		'createdAt',
		'updatedAt',
		'deletedAt',
	];

	/**
	 * List of model relation methods
	 * 
	 * @var array
	 */
	public $relation_methods = [
		'categoryId',
		'posts',
		'parentId',
	];

	/**
	 * Table primary key
	 * 
	 * @var string
	 */
	protected $primaryKey = 'id';

	/**
	 * Indicates whether table has updated_at and created_at columns 
	 * 
	 * @var bool
	 */
	public $timestamps = false;

	/**
	 *
	 * @return BelongsTo
	 */
	public function categoryId()
	{
		# code...
		return $this->belongsTo(\App\Models\Category::class, 'categoryId', 'id');
	}

	/**
	 *
	 * @return HasMany
	 */
	public function posts()
	{
		# code...
		return $this->hasMany(\App\Models\Post::class, 'parentId', 'id');
	}

	/**
	 *
	 * @return BelongsTo
	 */
	public function parentId()
	{
		# code...
		return $this->belongsTo(\App\Models\Post::class, 'parentId', 'id');
	}

	/**
	 * Bootstrap the model and its traits.
	 * 
	 *
	 * @return void
	 */
	protected static function boot()
	{
		# code...
		parent::boot();
	}

}