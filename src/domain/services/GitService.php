<?php

namespace yii2module\vendor\domain\services;

use yii2lab\domain\services\ActiveBaseService;
use yii2module\vendor\domain\repositories\file\GitRepository;

/**
 * Class GitService
 *
 * @package yii2module\vendor\domain\services
 *
 * @property GitRepository $repository
 */
class GitService extends ActiveBaseService {
	
	public $ignore;
	
	public function pull($entity) {
		return $this->repository->pull($entity);
	}
	
	public function push($entity) {
		return $this->repository->push($entity);
	}
	
	public function checkout($entity, $branch) {
		return $this->repository->checkout($entity, $branch);
	}
	
}
