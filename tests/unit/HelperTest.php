<?php

use WebChemistry\Testing\Components\Helpers\Helpers;

class HelperTest extends \Codeception\Test\Unit {

	use WebChemistry\Testing\TUnitTest;

	protected function _before() {
	}

	protected function _after() {
	}

	public function testVariableAccess() {
		$this->assertInstanceOf('WebChemistry\Testing\Services', $this->services);
	}

	public function testClassFormService() {
		$this->assertInstanceOf('WebChemistry\Testing\Components\Form', $this->services->form);
		$this->assertInstanceOf('WebChemistry\Testing\Components\Form', $this->services->getForm());
		$this->assertSame($this->services->getForm(), $this->services->getForm());
		$this->assertSame($this->services->getForm(), $this->services->getForm());
	}

	public function testClassPresenterService() {
		$this->assertInstanceOf('WebChemistry\Testing\Components\Presenter', $this->services->presenter);
		$this->assertInstanceOf('WebChemistry\Testing\Components\Presenter', $this->services->getPresenter());
		$this->assertSame($this->services->presenter, $this->services->getPresenter());
	}

	public function testClassFileSystemService() {
		$this->assertInstanceOf('WebChemistry\Testing\Components\FileSystem', $this->services->fileSystem);
		$this->assertInstanceOf('WebChemistry\Testing\Components\FileSystem', $this->services->getFileSystem());
		$this->assertSame($this->services->getFileSystem(), $this->services->fileSystem);
	}

	public function testExtractPathToArray() {
		$this->assertSame([
			'name' => [
				'val' => 'foo'
			]
		], Helpers::extractPathToArray('name.val', 'foo'));
	}

}