<?php
require_once 'Fields.php';

class Validator {
    
	/*
	 * validate all fields in the specified array of Fields object
	 */
	public static function validateAll($fields, $db) {
		foreach($fields as $field) {
			self::validate($field, $db);
		}
	}
	
	public static function validate($field, $db) {
		$method = 'validate' . ucfirst($field->getName());
		if (method_exists('Validator', $method)) {
			self::$method($field, $db);
		}
		else {
			self::validateField($field);
		}
	}
	
	/*
	 * validate an unknown field type
	 *
	 * If a required field, the field must contain
	 * a value.
	 *
	 * In case a required field is empty, the error of the
	 * field is set to an error message.
	 */
	public static function validateField($field) {
		if ($field->isRequired() && $field->getValue() === '') {
			$field->setError('Enter a value.');
		}
	}
	
	/*
	 * validate a name field
	 *
	 * The name should consist of at most 128 characters.
	 * A valid character in the name is a letters, digit,
	 * space, and the hyphen.
	 *
	 * In case of an invalid name, the error of the name
	 * field is set to an error message.
	 */
	public static function validateFirstname($field) {
		self::validateName($field);
	}
	
	public static function validateLastname($field) {
		self::validateName($field);
	}
	
	public static function validateName($field) {
		// check if the field has a value
		$value = $field->getValue();
		if ($value === '') {
			if ($field->isRequired()) {
				$field->setError('Enter your name.');
			}
			return;
		}
		// Check for the length
		if (strlen($value) > 128) {
			$field->setError('The name is too long.');
			return;
		}
		// Call the pattern method to check for valid characters
		$pattern = '~^[a-zA-Z0-9 \-]+$~';
		if (preg_match($pattern, $value) === 0) {
			$field->setError('The name contains invalid characters');
		}
	}
	
	/*
	 * validate an email field
	 *
	 * The email field must follow the specification in
	 * RFC 5322 3.4.1 (quoted strings do not need to be
	 * considered as valid).
	 *
	 * In case of an invalid emial address, the error of
	 * the email field is set to an error message.
	 */
	public static function validateEmail($field) {
		$value = $field->getValue();
		if ($value === '') {
			if ($field->isRequired()) {
				$field->setError('Enter an email address.');
			}
			return;
		}
		// Check for the length
		if (strlen($value) > 256) {
			$field->setError('The email address can have at most 256 characters.');
			return;
		}
		$parts = explode('@', $value);
		if (count($parts) < 2) {
			$field->setError('At sign required.');
			return;
		}
		if (count($parts) > 2) {
			$field->setError('Only one at sign allowed.');
			return;
		}
		$local = $parts[0];
		$domain = $parts[1];
		 
		//Check the local part
		$valid_chars = "[a-zA-Z0-9!#$%&\'*+\-/=?^_`{|}\~]+";
		$local_pattern = '~^' . $valid_chars . '(\.' . $valid_chars . ')*$~';
		if (preg_match($local_pattern, $local) === 0) {
			$field->setError('Invalid local part');
			return;
		}
		 
		//Check the domain part
		$labels = explode('.', $domain);
		if (count($labels) < 2) {
			$field->setError('The domain must contain at least two lables.');
			return;
		}
		$label_pattern = '~^[a-zA-Z0-9\-]{1,63}$~';
		foreach($labels as $label) {
			if (preg_match($label_pattern, $label) === 0) {
				$field->setError('Invalid domain');
				return;
			}
		}
		$label = $labels[count($labels)-1];
		$label_pattern = '~^[0-9]+$~';
		if (preg_match($label_pattern, $label) === 1) {
			$field->setError('Invalid domain');
			return;
		}
	}
	
	/*
	 * validate a phone field
	 *
	 * The phone should only contain digits space characters,  
	 * hyphens, and parenthesis. The phone has to contain 
	 * exactly 9 or 10 digits.
	 * 
	 * In case of an invalid name, the error of the name
	 * field is set to an error message.
	 */
	public static function validatePhone($field) {
		// check if the field has a value
		$value = $field->getValue();
		if ($value === '') {
			if ($field->isRequired()) {
				$field->setError('Enter a phone number.');
			}
			return;
		}
		// Call the pattern method to check for valid characters
		$pattern = '~^[0-9 \-()]+$~';
		if (preg_match($pattern, $value) === 0) {
		    $field->setError('The phone number contains invalid characters');
		    return;
		}
		$number_digits = preg_match_all('/[0-9]/', $value);
		if ($number_digits > 10) {
		    $field->setError('The phone number cannot contain more than 10 digits');
		    return;
		}
		if ($number_digits < 9) {
		    $field->setError('The phone number must contain at least 9 digits');
		    return;
		}
	}
	
	/*
	 * validate a date field
	 *
	 * The date must follow the MM/DD/YYYY or YYY-MM-DD format
	 * and must be a valid date.
	 *
	 * In case of an invalid date, the error of the date
	 * field is set to an error message.
	 */
	public static function validateDate($field) {
		// check if the field has a value
		$value = $field->getValue();
		if ($value === '') {
			if ($field->isRequired()) {
				$field->setError('Enter a date.');
			}
			return;
		}
		// Call the pattern method to validate a date in the MM/DD/YYYY or YYYY-MM-DD format
		$pattern1 = '~^[0-9]{2}/[0-9]{2}/[0-9]{4}$~';
		$pattern2 = '~^[0-9]{4}-[0-9]{2}-[0-9]{2}$~';
		if (preg_match($pattern1, $value) === 0 && preg_match($pattern2, $value) === 0) {
		    $field->setError('Enter a valid date in MM/DD/YYYY or YYYY-MM-DD format');
		    return;
		}
		if (preg_match($pattern1, $value) === 1) {
		    // Check for valid date values in case of the MM/DD/YYYY format
		    $date = explode("/", $value);
		    if (!checkdate((int)$date[0], (int)$date[1], (int)$date[2])) {
		        $field->setError('The entered date is invalid.');
		    }
		}
		else {
		    // Check for valid date values in case of the YYYY-MM-DD format
		    $date = explode("-", $value);
		    if (!checkdate((int)$date[1], (int)$date[2], (int)$date[0])) {
		        $field->setError('The entered date is invalid.');
		    }
		}
	}
	
	/*
	 * validate a library field
	 *
	 * The library field must contain a valid library name.
	 *
	 * In case of an invalid library, the error of the library
	 * field is set to an error message.
	 */
	public static function validateLibraryID($field, $db) {
		$value = $field->getValue();
		
		if ($value === '') {
			if ($field->isRequired()) {
				$field->setError('Select a library.');
			}
			return;
		}
		
		if ($db->getLibrary($value) == Null) {
			$field->setError('Select a valid library.');
			return;
		}
	}
	
	/*
	 * validate a comments field
	 *
	 * The comments field should consist of at most 128 characters.
	 * It is not allowed to contain one or more words ofa list of 
	 * three specific words.
	 *
	 * In case of an invalid comment, the error of the commemt
	 * field is set to an error message.
	 */
	public static function validateComments($field) {
		// check if the field has a value
		$value = $field->getValue();
		if ($value === '') {
			if ($field->isRequired()) {
				$field->setError('Enter your comments.');
			}
			return;
		}
		// Check for the length
		if (strlen($value) > 512) {
		    $field->setError('The comment is too long.');
		    return;
		}
		// Check for excluded words
		$pattern1 = '~shoot~i';
		$pattern2 = '~darn~i';
		$pattern3 = '~crap~i';
		if (preg_match($pattern1, $value) === 1 ||
		    preg_match($pattern2, $value) === 1 ||
		    preg_match($pattern3, $value) === 1) {
		  $field->setError('Please abstain from curse words.');
		}
	}
	
	/*
	 * validate a password field
	 *
	 * The password field should consist of at least 12 characters.
	 * Must contain at least one lowercase letter
	 * Must contain at least one uppercase letter
	 * Must contain at least one number
	 * Must contain at least one special character: ! # $ % & ( ) * + - . : ? + ;
	 * Cannot contain parts of the user's name or username.  In particular
	 * the password cannot contain any substring of 4 or more letters of
	 * the user's first or last name, for example Susan Smith cannot use
	 * the password Last=mith123 because it contains the substring "mith"
	 * of her last name Smith
	 *
	 * In case of an invalid comment, the error of the commemt
	 * field is set to an error message.
	 */
	public static function validatePassword($field) {
	    // check if the field has a value
	    $value = $field->getValue();
	    if ($value === '') {
	        if ($field->isRequired()) {
	            $field->setError('Enter your password.');
	        }
	        return;
	    }
	    // Check for the length
	    if (strlen($value) < 12) {
	        $field->setError('The password should be at least 12 characters.');
	        return;
	    }
	    // Checks pattern for uppercase and lowercase, one number and special character
	    $pattern = '~^.*(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!#$%&()*+,-.:?=;]).*$~';
	    if (preg_match($pattern, $value) === 0) {
	        $field->setError('The password must contain at least one uppercase, one lowercase letter, one number and a special character');
	    }
	    // Checks pattern for 4 characters from user name
	    //$pattern = '~([]{4})~';
	    //$name = 'Blakely';
	    //if (preg_match($pattern, $name) === preg_match($pattern, $value)) {
	    //    $field->setError('The password cannot contain more than 4 characters from your name');
	    //    return;
	    //}
	}
}
?>
