<?php

/*
 * This file is part of the Sonata project.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\SeoBundle\Block\Social;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\BlockBundle\Model\BlockInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Facebook share button integration.
 *
 * @see https://developers.facebook.com/docs/plugins/share-button/
 *
 * @author Sylvain Deloux <sylvain.deloux@ekino.com>
 */
class FacebookShareButtonBlockService extends BaseFacebookSocialPluginsBlockService
{
    protected $layoutList = array(
        'box_count'    => 'box_count',
        'button_count' => 'button_count',
        'button'       => 'button',
        'icon_link'    => 'icon_link',
        'icon'         => 'icon',
        'link'         => 'link',
    );

    /**
     * {@inheritdoc}
     */
    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'template'    => 'SonataSeoBundle:Block:block_facebook_share_button.html.twig',
            'url'         => null,
            'width'       => null,
            'layout'      => $this->layoutList['box_count'],
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function buildEditForm(FormMapper $formMapper, BlockInterface $block)
    {
        $formMapper->add('settings', 'sonata_type_immutable_array', array(
            'keys' => array(
                array('url',    'url',      array('required' => false)),
                array('width',  'integer',  array('required' => false)),
                array('layout', 'choice',   array('required' => true, 'choices' => $this->layoutList)),
            ),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Facebook Social Plugin - Share button';
    }
}
