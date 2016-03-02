<?php
/**
 * Test the Formulas class.
 */
namespace WhyHow\Test\TestCase\Math;

use WhyHow\Math\Formulas;

/**
 * \WhyHow\Test\TestCase\Math\FormulasTest
 */
class FormulasTest extends \PHPUnit_Framework_TestCase {
	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$this->Formulas = new Formulas();
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->Formulas);
		parent::tearDown();
	}

	/**
	 * Test the add function in a basic way.
	 *
	 * @return void
	 */
	public function testBasic() {
		$output = $this->Formulas->add(1,1);
		$this->assertEquals(
			2,
			$output,
			'The addition of 1 and 1 should always equal 2.'
		);
	}

	/**
	 * Test the add function.
	 *
	 * @param int $first First integer input.
	 * @param int $second Second integer input.
	 * @param int $expected Expected output.
	 * @param int $msg PHPUnit failure message.
	 * @return void
	 * @dataProvider providerAdd
	 */
	public function testAddWithProvider($first, $second, $expected, $msg = '') {
		$this->assertEquals(
			$expected,
			$this->Formulas->add($first, $second),
			$msg
		);
	}

	/**
	 * DataProvider for testAddWithProvider
	 *
	 * @return array Data inputs for
	 */
	public function providerAdd() {
		return [
			'1,1,2' => [
				1,
				1,
				2,
				'1+1 should = 2',
			],
			'1,0,1' => [
				1,
				0,
				1,
				'1+0 should = 1',
			],
			'0,1,1' => [
				0,
				1,
				1,
				'1+0 should = 1',
			],
			'0,0,0' => [
				0,
				0,
				0,
				'0+0 should = 0',
			],
			'-1,-1,-2' => [
				-1,
				-1,
				-2,
				'-1+-1 should = -2',
			],
		];
	}

	/**
	 * Test the addThree function.
	 *
	 * @return void
	 */
	public function testAddThree() {
		$first = 1;
		$second = 2;
		$mockedResponse = 0;
		$third = 4;
		$output = 7;

		$this->FormulaMock = $this->getMock(
			'\WhyHow\Math\Formulas',
			['add']
		);

		$this->FormulaMock->expects($this->at(0))
			->method('add')
			->with($first, $second)
			->will($this->returnValue($mockedResponse));
		$this->FormulaMock->expects($this->at(1))
			->method('add')
			->with($mockedResponse, $third)
			->will($this->returnValue($output));
		$this->assertEquals(
			$output,
			$this->FormulaMock->addThree($first, $second, $third),
			'addThree should return our underlying mocked response.'
		);
	}

	/**
	 * Test the compoundInterest function.
	 *
	 * @param double $principal The overall principal of the total.
	 * @param double $rateOfInterest The percentage of the interest rate 0.10 equals 10%.
	 * @param int $timeInMonths The time of the loan in months.
	 * @param double $expectedOut The expected output from calling compoundInteres.
	 * @return void
	 * @dataProvider providerCompoundInterest
	 */
	public function testCompoundInterest($principal, $interestRate, $timeInMonths, $expectedOut) {
		$this->IsValidType = $this->getMock(
			'\WhyHow\Validate\IsValidType',
			['isInteger', 'truncateFloats']
		);

		// at(index), where index is the method call order number for the Mock Object.
		$this->IsValidType->expects($this->at(1))
			->method('truncateFloats')
			->with($principal)
			->will($this->returnValue($principal));
		$this->IsValidType->expects($this->at(2))
			->method('truncateFloats')
			->with($interestRate)
			->will($this->returnValue($interestRate));

		$this->IsValidType->expects($this->once())
			->method('isInteger')
			->with($timeInMonths)
			->will($this->returnValue(true));

		$this->FormulaMock = $this->getMock(
			'\WhyHow\Math\Formulas',
			['returnIsValidType']
		);
		$this->FormulaMock->expects($this->once())
			->method('returnIsValidType')
			->with()
			->will($this->returnValue($this->IsValidType));

		$output = $this->FormulaMock->compoundInterest($principal, $interestRate, $timeInMonths);

		$this->assertEquals(
			$expectedOut,
			$output,
			"{$output} should have been equal to the expected output of {$expectedOut}"
		);
	}

	/**
	 * DataProvider for testCompoundInterest.
	 *
	 * @return array Data inputs for testCompoundInterest.
	 */
	public function providerCompoundInterest() {
		return [
			[
				1000.00, // principal
				0.10, // interestRate
				12, // timeInMonths
				1104.71, // expectedOutput
			],
			[
				1000.00,
				0.20,
				12,
				1219.39,
			],
			[
				1000.00,
				0.25,
				12,
				1280.73,
			],
		];
	}

	/**
	 * Test the compoundInterest function when it throws an Exception.
	 *
	 * @return void
	 */
	public function testCompoundInterestException() {
		$principal = 1000.00;
		$interestRate = 0.10;
		$timeInMonths = 12;

		$this->IsValidType = $this->getMock(
			'\WhyHow\Validate\IsValidType',
			['isInteger', 'truncateFloats']
		);

		$this->IsValidType->expects($this->never())
			->method('truncateFloats');

		$this->IsValidType->expects($this->once())
			->method('isInteger')
			->with($timeInMonths)
			->will($this->returnValue(false));

		$this->FormulaMock = $this->getMock(
			'\WhyHow\Math\Formulas',
			['returnIsValidType']
		);
		$this->FormulaMock->expects($this->once())
			->method('returnIsValidType')
			->with()
			->will($this->returnValue($this->IsValidType));

		$this->setExpectedException(
			'\BadMethodCallException',
			'Time in Months must be an integer value.'
		);
		$this->FormulaMock->compoundInterest($principal, $interestRate, $timeInMonths);
	}
}
