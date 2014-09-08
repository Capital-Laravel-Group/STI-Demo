<?php

class FormFieldText extends FormField {

	public function getMarkupAttribute() {
		$attributes = [
			'class' => 'text'
		];

		return '<p' . HTML::attributes($attributes) . '>' . e($this->attributes['value']) . '</p>';
	}

}