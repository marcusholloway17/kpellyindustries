<?php

/*
 * This file is auto generated using the Drewlabs Code Generator package (v2.3)
 *
 * (c) Sidoine Azandrew <contact@liksoft.tg>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

namespace App\Http\Controllers;

use App\Services\SubscriptionService;
use App\Http\ViewModels\SubscriptionViewModel;
use App\Dto\SubscriptionDto;
use Drewlabs\Contracts\Support\Actions\ActionHandler;
use Drewlabs\Contracts\Validator\Validator;
use Drewlabs\Packages\Http\Contracts\ResponseHandler;

// Function import statements
use function Drewlabs\Packages\Database\Proxy\useMapQueryResult;
use function Drewlabs\Packages\Database\Proxy\CreateQueryAction;
use function Drewlabs\Packages\Database\Proxy\SelectQueryAction;
use function Drewlabs\Packages\Database\Proxy\UpdateQueryAction;
use function Drewlabs\Packages\Database\Proxy\DeleteQueryAction;

final class SubscriptionsController
{

	/**
	 * Injected instance of MVC service
	 * 
	 * @var ActionHandler
	 */
	private $service = null;

	/**
	 * Injected instance of the validator class
	 * 
	 * @var Validator
	 */
	private $validator = null;

	/**
	 * Injected instance of the response handler class
	 * 
	 * @var ResponseHandler
	 */
	private $response = null;

	/**
	 * Class instance initializer
	 * 
	 * @param Validator $validator
	 * @param ResponseHandler $response
	 * @param ActionHandler $service
	 *
	 * @return self
	 */
	public function __construct(Validator $validator, ResponseHandler $response, ActionHandler $service = null)
	{
		# code...
		$this->validator = $validator;
		$this->response = $response;
		$this->service = $service ?? new SubscriptionService();
	}

	/**
	 * Display or Returns a list of items
	 * @Route /GET /subscriptions[/{$id}]
	 * 
	 * @param SubscriptionViewModel $viewModel
	 *
	 * @return mixed
	 */
	public function index(SubscriptionViewModel $viewModel)
	{
		# code...
		// TODO : Provides policy handlers
		
		$result = $this->service->handle(
			$viewModel->has('per_page') ? SelectQueryAction(
				$viewModel->makeFilters(),
				(int)$viewModel->get('per_page'),
				$viewModel->has('_columns') ? (is_array($colums_ = $viewModel->get('_columns')) ? $colums_ : (@json_decode($colums_, true) ?? ['*'])): ['*'],
				$viewModel->has('page') ? (int)$viewModel->get('page') : null,
			) : SelectQueryAction(
				$viewModel->makeFilters(),
				$viewModel->has('_columns') ? (is_array($colums_ = $viewModel->get('_columns')) ? $colums_ : (@json_decode($colums_, true) ?? ['*']))  : ['*'],
			),
			useMapQueryResult(function ($value)  use ($viewModel) {
				return $value ? (new SubscriptionDto($value))->mergeHidden($viewModel->get('_hidden') ?? []) : $value;
			})
		);
		return $this->response->ok($result);
	}

	/**
	 * Display or Returns an item matching the specified id
	 * @Route /GET /subscriptions/{$id}
	 * 
	 * @param SubscriptionViewModel $viewModel
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function show(SubscriptionViewModel $viewModel, $id)
	{
		# code...
		// TODO: Provide Policy handlers if required
		$result = $this->service->handle(
			SelectQueryAction(
				$id,
				$viewModel->has('_columns') ? (is_array($colums_ = $viewModel->get('_columns')) ? $colums_ : (@json_decode($colums_, true) ?? ['*'])): ['*'],
			),
			function ($value) use ($viewModel) {
				return null !== $value ? (new SubscriptionDto($value))->mergeHidden($viewModel->get('_hidden') ?? []) : $value;
			}
		);
		return $this->response->ok($result);
	}

	/**
	 * Stores a new item in the storage
	 * @Route /POST /subscriptions
	 * 
	 * @param SubscriptionViewModel $viewModel
	 *
	 * @return mixed
	 */
	public function store(SubscriptionViewModel $viewModel)
	{
		# code...
		// validate request inputs
		$result = $this->validator->validate($viewModel, function () use ($viewModel) {
			$query = $viewModel->get('_query') ?? [];
			return $this->service->handle(CreateQueryAction($viewModel, [
				'relations' => $query['relations'] ?? [],
				'upsert_conditions' => $query['upsert_conditions'] ?? ($viewModel->has($viewModel->getPrimaryKey()) ?
					[$viewModel->getPrimaryKey() => $viewModel->get($viewModel->getPrimaryKey()),] : []),
			]), function ($value) {
				return null !== $value ? new SubscriptionDto($value) : $value;
			});
		});
		
		return $this->response->ok($result);
	}

	/**
	 * Update the specified resource in storage.
	 * @Route /PUT /subscriptions/{id}
	 * @Route /PATCH /subscriptions/{id}
	 * 
	 * @param SubscriptionViewModel $viewModel
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function update(SubscriptionViewModel $viewModel, $id)
	{
		# code...
		$viewModel = $viewModel->merge(["id" => $id]);
		$result = $this->validator->updating()->validate($viewModel, function () use ($id, $viewModel) {
			$query = $viewModel->get('_query') ?? [];
			return $this->service->handle(UpdateQueryAction($id, $viewModel, [
				'relations' => $query['relations'] ?? [],
			]), function ($value) {
				return null !== $value ? new SubscriptionDto($value) : $value;
			});
		});
		
		return $this->response->ok($result);
	}

	/**
	 * Remove the specified resource from storage.
	 * @Route /DELETE /subscriptions/{id}
	 * 
	 * @param SubscriptionViewModel $viewModel
	 * @param mixed $id
	 *
	 * @return mixed
	 */
	public function destroy(SubscriptionViewModel $viewModel, $id)
	{
		# code...
		// TODO: Provide Policy handlers if required
		$result = $this->service->handle(DeleteQueryAction($id));
		return $this->response->ok($result);
	}

}