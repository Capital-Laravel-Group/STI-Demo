<?php
class BaseModel extends Eloquent {

	public function __construct($attributes = array())
	{
		parent::__construct($attributes);
		if ($this->useSti()) {
			$this->setAttribute($this->stiClassField, get_class($this));
		}
	}

	private function useSti() {
		return ($this->stiClassField && $this->stiBaseClass);
	}

	public function newQuery($excludeDeleted = true)
	{
		$builder = parent::newQuery($excludeDeleted);
		// If I am using STI, and I am not the base class, 
		// then filter on the class name.    
		if ($this->useSti() && get_class(new $this->stiBaseClass) !== get_class($this)) {
			$builder->where($this->stiClassField, 'LIKE', $this->classNameToType(get_class($this)) . '%');
		}
		return $builder;
	}

	public function newFromBuilder($attributes = array())
	{
		if ($this->useSti() && $attributes->{$this->stiClassField}) {
			$class = $this->typeToClassName($attributes->{$this->stiClassField});
			
			if (class_exists($class)) {
				$instance = new $class;
				$instance->exists = true;
				$instance->setRawAttributes((array)$attributes, true);
				return $instance;
			}
		}
		return parent::newFromBuilder($attributes);
	}

	private function typeToClassName($type) {
		list($name) = explode('_', $type);

		$numbers = implode('', range(0, 9));
		return trim($this->stiBaseClass . ucfirst(strtolower($name)), $numbers);
	}

	private function classNameToType($className) {
		return strtoupper(substr($className, strlen($this->stiBaseClass)));
	}
}