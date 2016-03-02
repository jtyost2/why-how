<?php
/**
 * Class to validate inputs as certain types.
 */
namespace WhyHow\Validate;

/**
 * \WhyHow\Validate\IsValidType
 */
class IsValidType {
	/**
	 * Ensure that a integer field is an integer and not a float.
	 *
	 * @param mixed $value The value of the current field being validated.
	 * @return bool True if $value is an integer.
	 */
	public function isInteger($value) {
		// Code to ensure value is an integer and not just numeric
		// http://stackoverflow.com/a/26058216/657
		return ((int)$value == $value && $value > 0);
	}

	/**
	 * Truncate a float value to ensure it only has a certain number of digits.
	 *
	 * @param mixed $value The value of the current field being validated.
	 * @param int $precision The number of decimal places to round the value to.
	 * @return double The value rounded to precision number of decimal places.
	 */
	public function truncateFloats($value, $precision = 2) {
		// short circuit in zero case.
		if ($value == 0) {
			return 0.00;
		}

		// Are we negative?
    $negative = $value / abs($value);
    // Cast the number to a positive to solve rounding
    $value = abs($value);
    // Calculate precision number for dividing / multiplying
    $precision = pow(10, $precision);
    // Run the math, re-applying the negative value to ensure returns correctly negative / positive
    return floor( $value * $precision ) / $precision * $negative;
	}
}
