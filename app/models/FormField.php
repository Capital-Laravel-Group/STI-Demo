<?php

class FormField extends BaseModel {

	public $timestamps = false;
	protected $stiClassField = 'type';
	protected $stiBaseClass = 'FormField';
	protected $table = 'form_fields';

	protected function getEditorAttributes() {
		return array(
			'data-id' => $this->attributes['id'],
			'data-type' => $this->attributes['type'],
			'contentEditable' => 'true',
			'class' => 'editable',
			'style' => $this->attributes['styles']
		);
	}

	/**
	 * Field markup
	 * Should be overridden by subclasses
	 * @return string
	 */
	public function getMarkupAttribute() {
		return '<p>&mdash; Not implemented &mdash;</p>';
	}
	
}