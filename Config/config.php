<?php

/*
 * @copyright   2018 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

return [
    'name'        => 'Comtele',
    'description' => 'Comtele SMS integration',
    'author'      => 'https://alanmosko.com.br/',
    'version'     => '1.0.0',
    'services' => [
        'events'  => [],
        'forms'   => [],
        'helpers' => [],
        'other'   => [
            'mautic.sms.transport.comtele' => [
                'class'     => \MauticPlugin\MauticComteleBundle\Services\ComteleApi::class,
                'arguments' => [
                    'mautic.page.model.trackable',
                    'mautic.helper.phone_number',
                    'mautic.helper.integration',
                    'monolog.logger.mautic',
                ],
                'alias' => 'mautic.sms.config.transport.comtele',
                'tag'          => 'mautic.sms_transport',
                'tagArguments' => [
                    'integrationAlias' => 'Comtele',
                ],
            ],
        ],
        'models'       => [],
        'integrations' => [
            'mautic.integration.comtele' => [
                'class' => \MauticPlugin\MauticComteleBundle\Integration\ComteleIntegration::class,
            ],
        ],
    ],
    'routes'     => [],
    'menu' => [
        'main' => [
            'items' => [
                'mautic.sms.smses' => [
                    'route'  => 'mautic_sms_index',
                    'access' => ['sms:smses:viewown', 'sms:smses:viewother'],
                    'parent' => 'mautic.core.channels',
                    'checks' => [
                        'integration' => [
                            'Comtele' => [
                                'enabled' => true,
                            ],
                        ],
                    ],
                    'priority' => 70,
                ],
            ],
        ],
    ],
    'parameters' => [],
];
