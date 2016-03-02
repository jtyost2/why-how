<?php
/**
 * Test the IsValidTypes class.
 */
namespace WhyHow\Test\TestCase\Validate;

use WhyHow\Validate\IsValidType;

/**
 * \WhyHow\Test\TestCase\Validate\IsValidType
 */
class IsValidTypeTest extends \PHPUnit_Framework_TestCase {
	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$this->IsValidType = new IsValidType();
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->IsValidType);
		parent::tearDown();
	}

	/**
	 * test the isInteger() method.
	 *
	 * @param mixed $value The input value to test.
	 * @param bool $expected The expected validation result.
	 * @param string $msg Optional PHPUnit assertion failure message.
	 * @return void
	 * @dataProvider providerIsInteger
	 */
	public function testIsInteger($value, $expected, $msg = '') {
		$this->assertEquals(
			$expected,
			$this->IsValidType->isInteger($value),
			$msg
		);
	}

	/**
	 * Provide input/output pairs to testIsInteger().
	 *
	 * @return array Data inputs to testIsInteger.
	 */
	public function providerIsInteger() {
		return [
			[
				null,
				false,
				'null value should fail.',
			],
			[
				0,
				false,
				'Zero should fail.',
			],
			[
				'0',
				false,
				'Zero string should fail.',
			],
			[
				1,
				true,
				'Integer should pass.',
			],
			[
				'1',
				true,
				'Integer string should pass.',
			],
			[
				10,
				true,
				'Integer should pass.',
			],
			[
				'10',
				true,
				'Integer string should pass.',
			],
			[
				(-10),
				false,
				'Negative Integer should fail.',
			],
			[
				'-10',
				false,
				'Negative Integer string should fail.',
			],
			[
				10.01,
				false,
				'Float should fail.',
			],
			[
				'10.01',
				false,
				'Float string should fail.',
			],
			[
				(-10.01),
				false,
				'Negative Float should fail.',
			],
			[
				'-10.01',
				false,
				'Negative Float string should fail.',
			],
		];
	}

	/**
	 * test the truncateFloats() method.
	 *
	 * @param mixed $value The input value to test.
	 * @param int $precision The number of decimal places to round the value to.
	 * @param bool $expected The expected validation result.
	 * @return void
	 * @dataProvider providerTruncateFloats
	 */
	public function testTruncateFloats($value, $precision, $expected) {
		$this->assertSame(
			$expected,
			$this->IsValidType->truncateFloats($value, $precision),
			"With an input of {$value} and {$precision}, {$expected} should be returned."
		);
	}

	/**
	 * Provide input/output pairs to testTruncateFloats().
	 *
	 * @return array Data inputs to testTruncateFloats.
	 */
	public function providerTruncateFloats() {
		return [
			'Basic Test' => [
				10, // value
				2, // precision
				10.00, // expected
			],
			'Values with trailing zeros, a double is returned not an int' => [
				10,
				2,
				10.0,
			],
			'Test zero case' => [
				0,
				2,
				0.0,
			],
			'Verify no rounding occurs' => [
				1.006,
				2,
				1.00,
			],
			'Verify negatives kept properly' => [
				(-1.01),
				2,
				(-1.01),
			],
			'Verify precision param' => [
				1.006,
				3,
				1.006,
			],
		];
	}
}
