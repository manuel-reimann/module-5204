<?php
//Class to validate input forms from Login, Register and Profile Page
class ValidateForm
{
	// message to display when required fields are empty
	private $emptyRequiredFieldsFeedback = "Please fill in the missing fields.";
	// array to hold all feedback messages
	public $feedbackArray = array();
	// variable to track if validation was successful or not
	public $validationState = true;

	// method to validate form input for a single element
	public function validateElement($value, $isRequired, $elementName = "", $kind = "", $feedbackStr = "", $fieldName = "")
	{
		// sanitize the input value
		$cleanValue = $this->sanitize($value);
		$check = "positive";
		$kindArray = explode("|", $kind);

		// check if field is required and empty
		if ($isRequired && ($value == "")) {
			// add feedback message to array and set validation state to false
			$this->feedbackArray[] = "• " . $this->emptyRequiredFieldsFeedback . "<br>";
			$this->validationState = false;
		} elseif (strlen($value) > 0) {
			//call all the private functions and set the check variable to negative if they pass the validation
			if (in_array('email', $kindArray)) {
				if (!$this->isEmail($value)) {
					$check = "negative";
				}
			}

			if (in_array('password', $kindArray)) {
				if (!$this->isPassword($value)) {
					$check = "negative";
				}
			}
			//check if passwords and pwd repeat match each other
			if (in_array('passwordMatch', $kindArray)) {
				$pwd = $_POST['pwd'];
				if ($value !== $pwd) {
					$check = "negative";
				}
			}

			if (in_array('checkNames', $kindArray)) {
				if (!$this->containsNumbers($value, $elementName)) {
					$check = "negative";
				}
			}

			$minLengthArray = preg_grep("/^min_length-\d*/", $kindArray);
			if (count($minLengthArray) > 0) {
				$minLength = (int)substr(reset($minLengthArray), strlen('min_length-'));
				if (!$this->isMinLength($value, $minLength)) {
					$check = "negative";
				}
			}

			$maxLengthArray = preg_grep("/^max_length-\d*/", $kindArray);
			if (count($maxLengthArray) > 0) {
				$maxLength = (int)substr(reset($maxLengthArray), strlen('max_length-'));
				if (!$this->isMaxLength($value, $maxLength)) {
					$check = "negative";
				}
			}
		}

		if ($check == "negative") {
			// add feedback message to array and set validation state to false
			$this->feedbackArray[$fieldName] = "• " . $feedbackStr . "<br>";
			$this->validationState = false;
		}

		return $cleanValue;
	}

	// method to sanitize input values
	private function sanitize($str)
	{
		$cleanStr = strip_tags($str);
		$cleanStr = trim($cleanStr);
		return $cleanStr;
	}

	// method to validate email format
	private function isEmail($str)
	{
		if (filter_var($str, FILTER_VALIDATE_EMAIL)) {
			return true;
		} else {
			return false;
		}
	}

	// method to validate password format
	private function isPassword($str)
	{
		$pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/';
		if (preg_match($pattern, $str)) {
			return true;
		} else {
			return false;
		}
	}
	//method to check password inputs
	private function passwordMatch($password, $passwordRepeat)
	{
		if ($password === $passwordRepeat) {
			return true;
		} else {
			return false;
		}
	}
	//method to check if no numbers are in input
	private function containsNumbers($str, $fieldName)
	{
		if (preg_match('/[0-9]/', $str)) {
			$this->feedbackArray[] = $fieldName . " Please valid Names without numbers";
			$this->validationState = false;
			return false;
		} else {
			return true;
		}
	}
	//method to check the min lenght 
	private function isMinLength($str, $length)
	{
		$numChars = strlen($str);
		if ($numChars >= $length) {
			return true;
		} else {
			return false;
		}
	}
	//method to check the max lenght
	private function isMaxLength($str, $length)
	{
		$numChars = strlen($str);
		if ($numChars <= $length) {
			return true;
		} else {
			return false;
		}
	}
}
