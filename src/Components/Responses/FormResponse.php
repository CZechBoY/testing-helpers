<?php

namespace WebChemistry\Testing\Components\Responses;

use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;
use Nette\Utils\ObjectMixin;
use WebChemistry\Testing\TMagicGet;

/**
 * @property-read Form $form
 * @property-read mixed $response
 * @property-read array|ArrayHash $values
 */
class FormResponse {

	use TMagicGet;

	/** @var PresenterResponse */
	private $response;

	/** @var Form */
	private $form;

	public function __construct(PresenterResponse $response, Form $form) {
		$this->response = $response;
		$this->form = $form;
	}

	/**
	 * @return Form
	 */
	public function getForm() {
		return $this->form;
	}

	/**
	 * @return mixed
	 */
	public function getResponse() {
		return $this->response->getResponse();
	}

	/**
	 * @param bool $asArray
	 * @return array|ArrayHash
	 */
	public function getValues($asArray = FALSE) {
		return $this->form->getValues($asArray);
	}

	/**
	 * @param string $path
	 * @return mixed
	 */
	public function getValue($path) {
		$values = $this->getValues(TRUE);
		foreach (explode('.', $path) as $item) {
			$values = $values[$item];
		}

		return $values;
	}

	/**
	 * @param string $name
	 * @return mixed
	 */
	public function __get($name) {
		return ObjectMixin::get($this, $name);
	}

}
