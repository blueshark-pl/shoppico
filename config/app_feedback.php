<?php

use Feedback\Store\FilesystemStore;

return [
	'Feedback' => [
		'configuration' => [
			FilesystemStore::NAME => [
				'location' => ROOT . DS . 'tmp' . DS . 'feedback' . DS,
			]
		],
	],
];
