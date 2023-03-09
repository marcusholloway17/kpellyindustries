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
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Category extends EloquentModel implements ORMModel
{

	use Model;

	/**
	 * Model referenced table
	 * 
	 * @var string
	 */
	protected $table = 'categories';

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
		'label',
		'description',
		'parentId',
	];

	/**
	 * List of model relation methods
	 * 
	 * @var array
	 */
	public $relation_methods = [
		'categories',
		'parentId',
		'posts',
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
	 * @return HasMany
	 */
	public function categories()
	{
		# code...
		return $this->hasMany(\App\Models\Category::class, 'parentId', 'id');
	}

	/**
	 *
	 * @return BelongsTo
	 */
	public function parentId()
	{
		# code...
		return $this->belongsTo(\App\Models\Category::class, 'parentId', 'id');
	}

	/**
	 *
	 * @return HasMany
	 */
	public function posts()
	{
		# code...
		return $this->hasMany(\App\Models\Post::class, 'categoryId', 'id');
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