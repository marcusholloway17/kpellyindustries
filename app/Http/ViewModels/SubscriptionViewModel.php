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

use App\Models\Subscription;
use App\Dto\SubscriptionDto;
use Drewlabs\Packages\Http\Traits\HttpViewModel;
use Drewlabs\Packages\Database\Traits\CreatesFilters;
use Drewlabs\Contracts\Validator\ViewModel as ValidatorViewModel;

class SubscriptionViewModel implements ValidatorViewModel
{

	use HttpViewModel;
	use CreatesFilters;

	/**
	 * Model class associated with the view model
	 * 
	 * @var string
	 */
	private $model_ = Subscription::class;

	/**
	 * Data transfer class associated with the view model
	 * 
	 * @var string
	 */
	private $dtoclass_ = SubscriptionDto::class;

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
			'id' => ['sometimes', 'exists:subscriptions,id', 'integer'],
			'email' => ['required_without:id', 'string', 'max:255'],
			'unsubscribed' => ['nullable', 'boolean'],
			'unsubscribeAt' => ['nullable', 'date_format:Y-m-d H:i:s'],
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
			'id' => ['sometimes', 'exists:subscriptions,id', 'integer'],
			'email' => ['sometimes', 'string', 'max:255'],
			'unsubscribed' => ['nullable', 'boolean'],
			'unsubscribeAt' => ['nullable', 'date_format:Y-m-d H:i:s'],
		];
	}

}