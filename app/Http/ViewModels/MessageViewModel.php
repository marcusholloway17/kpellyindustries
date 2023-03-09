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

use App\Models\Message;
use App\Dto\MessageDto;
use Drewlabs\Packages\Http\Traits\HttpViewModel;
use Drewlabs\Packages\Database\Traits\CreatesFilters;
use Drewlabs\Contracts\Validator\ViewModel as ValidatorViewModel;

class MessageViewModel implements ValidatorViewModel
{

	use HttpViewModel;
	use CreatesFilters;

	/**
	 * Model class associated with the view model
	 * 
	 * @var string
	 */
	private $model_ = Message::class;

	/**
	 * Data transfer class associated with the view model
	 * 
	 * @var string
	 */
	private $dtoclass_ = MessageDto::class;

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
			'id' => ['sometimes', 'exists:messages,id', 'integer'],
			'email' => ['required_without:id', 'string', 'max:255'],
			'name' => ['required_without:id', 'string', 'max:255'],
			'subject' => ['nullable', 'string', 'max:255'],
			'content' => ['required_without:id', 'string', 'max:65535'],
			'readed' => ['nullable', 'boolean'],
			'replied' => ['nullable', 'boolean'],
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
			'id' => ['sometimes', 'exists:messages,id', 'integer'],
			'email' => ['sometimes', 'string', 'max:255'],
			'name' => ['sometimes', 'string', 'max:255'],
			'subject' => ['nullable', 'string', 'max:255'],
			'content' => ['sometimes', 'string', 'max:65535'],
			'readed' => ['nullable', 'boolean'],
			'replied' => ['nullable', 'boolean'],
		];
	}

}