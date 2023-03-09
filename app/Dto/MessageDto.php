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
use App\Models\Message;

/**
 * @property int id
 * @property string email
 * @property string name
 * @property string subject
 * @property mixed content
 * @property mixed readed
 * @property mixed replied
 *  
 * @package App\Dto
 */
class MessageDto implements ValueInterface, UrlRoutable
{

	use ModelAwareValue;
	use URLRoutableModelAware;

	/**
	 * @var array
	 */
	protected $__PROPERTIES__ = [
		'id',
		'email',
		'name',
		'subject',
		'content',
		'readed',
		'replied',
	];

	/**
	 * @var array
	 */
	protected $__HIDDEN__ = [];

	/**
	 * @var array
	 */
	protected $__CASTS__ = [];

	/**
	 * Creates an instance of the attached model
	 * 
	 *
	 * @return Message
	 */
	public function resolveModel()
	{
		# code...
		return self::createResolver(Message::class)();
	}

}