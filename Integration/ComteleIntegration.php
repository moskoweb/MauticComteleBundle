<?php

namespace MauticPlugin\MauticComteleBundle\Integration;

use Mautic\PluginBundle\Integration\AbstractIntegration;

/**
 * Class ComteleIntegration.
 */
class ComteleIntegration extends AbstractIntegration
{
    public function getName()
    {
        return 'Comtele';
    }

    public function getIcon()
    {
        return 'plugins/MauticComteleBundle/Assets/img/icon.png';
    }

    public function getSecretKeys()
    {
        return ['password'];
    }

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function getRequiredKeyFields()
    {
        return [
            'auth_token' => 'mautic.plugin.comtele.auth_token',
        ];
    }

    /**
     * @return array
     */
    public function getFormSettings()
    {
        return [
            'requires_callback'      => false,
            'requires_authorization' => false,
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getAuthenticationType()
    {
        return 'none';
    }

    /**
     * @param \Mautic\PluginBundle\Integration\Form|FormBuilder $builder
     * @param array                                             $data
     * @param string                                            $formArea
     */
    public function appendToForm(&$builder, $data, $formArea)
    {
    }
}
