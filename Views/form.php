<?php

echo PHPTheme::beginTag('form', $options);

foreach($fields as $field)
{
	echo $field;
}

foreach($errors as $error)
{
	echo PHPTheme::widget('alert', ['type' => 'error', 'message' => $error]);
}

foreach($buttons as $button)
{
	echo PHPTheme::widget('formButton', $button);
}

echo PHPTheme::endTag('form');
