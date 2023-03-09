<?php

/*
 * This file is auto generated using the Drewlabs Code Generator package (v2.3)
 *
 * (c) Sidoine Azandrew <contact@liksoft.tg>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

namespace App\Dto;

use Drewlabs\PHPValue\Traits\ModelAwareValue;
use Drewlabs\Packages\Database\Traits\URLRoutableModelAware;
use Drewlabs\PHPValue\Contracts\ValueInterface;
use Illuminate\Contracts\Routing\UrlRoutable;
use App\Models\Post;

/**
 * @property int id
 * @property string slug
 * @property string title
 * @property mixed description
 * @property int categoryId
 * @property int parentId
 * @property mixed isPublished
 * @property string publishedAt
 * @property string createdAt
 * @property string updatedAt
 * @property string deletedAt
 *  
 * @package App\Dto
 */
class PostDto implements ValueInterface, UrlRoutable
{

	use ModelAwareValue;
	use URLRoutableModelAware;

	/**
	 * @var array
	 */
	protected $__PROPERTIES__ = [
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
	 * @var array
	 */
	protected $__HIDDEN__ = [];

	/**
	 * @var array
	 */
	protected $__CASTS__ = [
		'categoryId' => 'value:\App\Dto\CategoryDto',
		'posts' => 'collectionOf:\App\Dto\PostDto',
		'parentId' => 'value:\App\Dto\PostDto',
	];

	/**
	 * Creates an instance of the attached model
	 * 
	 *
	 * @return Post
	 */
	public function resolveModel()
	{
		# code...
		return self::createResolver(Post::class)();
	}

}