<?php

return [

    'frontend' => [
        'formhandler-ajax-validate' => [
            'target' => \Typoheads\Formhandler\Middleware\AjaxValidate::class,
            'after' => [
                'typo3/cms-frontend/tsfe',
            ],
            'before' => [
                'typo3/cms-frontend/prepare-tsfe-rendering',
            ],
        ],
    ],
];
