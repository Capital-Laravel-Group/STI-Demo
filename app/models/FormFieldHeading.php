<?php

class FormFieldHeading extends FormField {

	public function getMarkupAttribute() {
		$attributes = [
			'class' => 'heading'
		];

		return '<h3' . HTML::attributes($attributes) . '>' . e($this->attributes['value']) . '</h3>';
	}

}