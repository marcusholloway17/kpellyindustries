<?php

/*
 * This file is auto generated using the Drewlabs Code Generator package (v2.3)
 *
 * (c) Sidoine Azandrew <contact@liksoft.tg>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

namespace App\Http\ViewModels;

use App\Models\Post;
use App\Dto\PostDto;
use Drewlabs\Packages\Http\Traits\HttpViewModel;
use Drewlabs\Packages\Database\Traits\CreatesFilters;
use Drewlabs\Contracts\Validator\ViewModel as ValidatorViewModel;

class PostViewModel implements ValidatorViewModel
{

	use HttpViewModel;
	use CreatesFilters;

	/**
	 * Model class associated with the view model
	 * 
	 * @var string
	 */
	private $model_ = Post::class;

	/**
	 * Data transfer class associated with the view model
	 * 
	 * @var string
	 */
	private $dtoclass_ = PostDto::class;

	/**
	 * Returns a fluent validation rules
	 * 
	 *
	 * @return array<string,string|string[]>
	 */
	public function rules()
	{
		# code...
		return [
			'id' => ['sometimes', 'exists:posts,id', 'integer'],
			'slug' => ['nullable', 'string', 'max:500'],
			'title' => ['required_without:id', 'string', 'max:400'],
			'description' => ['required_without:id', 'string', 'max:65535'],
			'categoryId' => ['nullable', 'integer', 'exists:categories,id'],
			'parentId' => ['nullable', 'integer', 'exists:posts,id'],
			'isPublished' => ['nullable', 'boolean'],
			'publishedAt' => ['nullable', 'date_format:Y-m-d H:i:s'],
			'createdAt' => ['required_without:id', 'date_format:Y-m-d H:i:s'],
			'updatedAt' => ['required_without:id', 'date_format:Y-m-d H:i:s'],
			'deletedAt' => ['nullable', 'date_format:Y-m-d H:i:s'],
		];
	}

	/**
	 * Returns a list of validation error messages
	 * 
	 *
	 * @return array<string,string|string[]>
	 */
	public function messages()
	{
		# code...
		return [];
	}

	/**
	 * Returns a fluent validation rules applied during update actions
	 * 
	 *
	 * @return array<string,string|string[]>
	 */
	public function updateRules()
	{
		# code...
		return [
			'id' => ['sometimes', 'exists:posts,id', 'integer'],
			'slug' => ['nullable', 'string', 'max:500'],
			'title' => ['sometimes', 'string', 'max:400'],
			'description' => ['sometimes', 'string', 'max:65535'],
			'categoryId' => ['nullable', 'integer', 'exists:categories,id'],
			'parentId' => ['nullable', 'integer', 'exists:posts,id'],
			'isPublished' => ['nullable', 'boolean'],
			'publishedAt' => ['nullable', 'date_format:Y-m-d H:i:s'],
			'createdAt' => ['sometimes', 'date_format:Y-m-d H:i:s'],
			'updatedAt' => ['sometimes', 'date_format:Y-m-d H:i:s'],
			'deletedAt' => ['nullable', 'date_format:Y-m-d H:i:s'],
		];
	}

}