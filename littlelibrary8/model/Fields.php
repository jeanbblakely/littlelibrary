<?php
class Field {
    private $name;
    private $value;
    private $error;

    public function __construct($name, $value, $required = False, $error = '') {
        $this->name = $name;
        $this->value = $value;
        $this->required = $required;
        $this->error = $error;
    }
    
    /*
     * get methods
     */
    public function getName() { 
    	return $this->name; 
    }
    public function getValue() { 
    	return $this->value; 
    }
    public function getError () {
    	return $this->error;
    }
    public function isRequired() {
    	return $this->required;
    }
    public function hasError() {
    	return $this->error !== ''; 
    }

    /*
     * set methods
     */
    public function setError($error) {
        $this->error = $error;
    }
    public function clearError() {
        $this->error = '';
    }
}

class Fields implements IteratorAggregate {
    private $fields = array();

    public function addField($name, $value, $required = False, $message = '') {
        $field = new Field($name, $value, $required, $message);
        $this->fields[$name] = $field;
    }

    /*
     * get methods
     */
    public function getValue($name) {
        return $this->fields[$name]->getValue();
    }
    
    public function getError($name) {
    	return $this->fields[$name]->getError();
    }
    
    public function hasError() {
        foreach ($this->fields as $field) {
            if ($field->hasError()) return true;
        }
        return false;
    }
    
    // required method to impelement interface IteratorAggregate
    public function getIterator() {
    	return new ArrayIterator($this->fields);
    }
}
?>