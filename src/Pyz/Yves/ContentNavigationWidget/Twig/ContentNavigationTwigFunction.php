<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ContentBannerWidget\Twig;

use SprykerShop\Yves\ContentNavigationWidget\Twig\ContentNavigationTwigFunction as SprykerShopContentNavigationTwigFunction;

class ContentNavigationTwigFunction extends SprykerShopContentNavigationTwigFunction
{
    /**
     * @uses \Pyz\Shared\ContentNavigation\ContentNavigationConfig::WIDGET_TEMPLATE_IDENTIFIER_LIST_NAVIGATION_HEADER
     */
    protected const WIDGET_TEMPLATE_IDENTIFIER_LIST_NAVIGATION_HEADER = 'navigation-header';

    /**
     * @uses \Pyz\Shared\ContentNavigation\ContentNavigationConfig::WIDGET_TEMPLATE_IDENTIFIER_LIST_NAVIGATION_HEADER_MOBILE
     */
    protected const WIDGET_TEMPLATE_IDENTIFIER_LIST_NAVIGATION_HEADER_MOBILE = 'navigation-header-mobile';

    /**
     * @uses \Pyz\Shared\ContentNavigation\ContentNavigationConfig::WIDGET_TEMPLATE_IDENTIFIER_LIST_NAVIGATION_FOOTER
     */
    protected const WIDGET_TEMPLATE_IDENTIFIER_LIST_NAVIGATION_FOOTER = 'navigation-footer';

    /**
     * @param string $templateIdentifier
     *
     * @return string|null
     */
    protected function findTemplate(string $templateIdentifier): ?string
    {
        $availableTemplates = [
            static::WIDGET_TEMPLATE_IDENTIFIER_TREE_INLINE => '@ContentNavigationWidget/views/navigation/tree-inline.twig',
            static::WIDGET_TEMPLATE_IDENTIFIER_TREE => '@ContentNavigationWidget/views/navigation/tree.twig',
            static::WIDGET_TEMPLATE_IDENTIFIER_LIST_INLINE => '@ContentNavigationWidget/views/navigation/list-inline.twig',
            static::WIDGET_TEMPLATE_IDENTIFIER_LIST => '@ContentNavigationWidget/views/navigation/list.twig',
            static::WIDGET_TEMPLATE_IDENTIFIER_LIST_NAVIGATION_HEADER => '@ContentNavigationWidget/views/navigation/navigation-header.twig',
            static::WIDGET_TEMPLATE_IDENTIFIER_LIST_NAVIGATION_HEADER_MOBILE => '@ContentNavigationWidget/views/navigation/navigation-header-mobile.twig',
            static::WIDGET_TEMPLATE_IDENTIFIER_LIST_NAVIGATION_FOOTER => '@ContentNavigationWidget/views/navigation/navigation-footer.twig',
        ];

        return $availableTemplates[$templateIdentifier] ?? null;
    }
}
