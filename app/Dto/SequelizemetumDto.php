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
use App\Models\Sequelizemetum;

/**
 * @property string name
 *  
 * @package App\Dto
 */
class SequelizemetumDto implements ValueInterface, UrlRoutable
{

	use ModelAwareValue;
	use URLRoutableModelAware;

	/**
	 * @var array
	 */
	protected $__PROPERTIES__ = [
		'name',
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
	 * @return Sequelizemetum
	 */
	public function resolveModel()
	{
		# code...
		return self::createResolver(Sequelizemetum::class)();
	}

}