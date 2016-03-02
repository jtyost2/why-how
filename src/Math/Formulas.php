<?php
/**
 * Some math formulas to test.
 */
namespace WhyHow\Math;

use \BadMethodCallException;
use WhyHow\Validate\IsValidType;

/**
 * \WhyHow\Math\Formulas
 */
class Formulas {
	/**
	 * Add two numbers together.
	 *
	 * @param int $first First integer.
	 * @param int $second Second integer.
	 * @return int The result of adding two ints together.
	 */
	public function add($first, $second) {
		return ($first + $second);
	}

	/**
	 * Add three numbers together.
	 *
	 * @param int $first First integer.
	 * @param int $second Second integer.
	 * @param int $third Third integer.
	 * @return int The result of adding three ints together.
	 */
	public function addThree($first, $second, $third) {
		$intermediate = $this->add($first, $second);
		return $this->add($intermediate, $third);
	}

	/**
	 * Calculate the interest on a loan.
	 *
	 * @param double $principal The overall principal of the total.
	 * @param double $rateOfInterest The percentage of the interest rate 0.10 equals 10%.
	 * @param int $timeInMonths The time of the loan in months.
	 * @return int The result of adding two ints together.
	 * @throws \BadMethodCallException on an invalid timeInMonths param value.
	 */
	public function compoundInterest($principal, $rateOfInterest, $timeInMonths) {
		$IsValidType = $this->returnIsValidType();

		if(!$IsValidType->isInteger($timeInMonths)) {
			throw new BadMethodCallException('Time in Months must be an integer value.');
		}

		$principal = $IsValidType->truncateFloats($principal);
		$rateOfInterest = $IsValidType->truncateFloats($rateOfInterest);

		$intermediate1 = ($rateOfInterest/$timeInMonths);
		$intermediate2 = (1 + $intermediate1);
		$intermediate3 = pow($intermediate2, $timeInMonths);
		$returnValue = $principal * $intermediate3;

		// $returnValue = ($principal * (pow((1 + ($rateOfInterest/$timeInMonths)), $timeInMonths)));

		return round($returnValue, 2);
	}

	/**
	 * Return a new instance of the IsValidType.
	 *
	 * @return \WhyHow\Validate\IsValidType Returns a new Instance.
	 * @codeCoverageIgnore Don't test PHP's ability to instantiate classes.
	 */
	protected function returnIsValidType() {
		return new IsValidType();
	}
}
