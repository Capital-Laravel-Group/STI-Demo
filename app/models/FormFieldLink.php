<?php

class FormFieldLink extends FormField {

	public function getMarkupAttribute() {
		return HTML::link($this->attributes['value'], $this->attributes['title']);
	}

}