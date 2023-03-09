<?php

/*
 * This file is auto generated using the Drewlabs Code Generator package (v2.3)
 *
 * (c) Sidoine Azandrew <contact@liksoft.tg>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

namespace App\Services;

use App\Models\Post;
use Drewlabs\Contracts\Support\Actions\ActionHandler;
use Drewlabs\Contracts\Data\DML\DMLProvider;
use Drewlabs\Contracts\Support\Actions\Exceptions\InvalidActionException;
use Drewlabs\Contracts\Support\Actions\ActionResult;
use Drewlabs\Contracts\Support\Actions\Action;
use Closure;

// Function import statements
use function Drewlabs\Packages\Database\Proxy\useDMLQueryActionCommand;
use function Drewlabs\Packages\Database\Proxy\DMLManager;

final class PostService implements ActionHandler
{

	/**
	 * Database query manager
	 * 
	 * @var DMLProvider
	 */
	private $dbManager = null;

	/**
	 * Creates an instance of the Service
	 * 
	 * @param DMLProvider $manager
	 *
	 * @return self
	 */
	public function __construct(DMLProvider $manager = null)
	{
		# code...
		$this->dbManager = $manager ?? DMLManager(Post::class);
	}

	/**
	 * {@inheritDoc}
	 * 
	 * @param Action $action
	 * @param Closure $callback
	 *
	 * @throws InvalidActionException
	 *
	 * @return ActionResult
	 */
	public function handle(Action $action, Closure $callback = null)
	{
		# code...
		return useDMLQueryActionCommand($this->dbManager)($action, $callback);
	}

}