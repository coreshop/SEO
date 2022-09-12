<?php

declare(strict_types=1);

/*
 * CoreShop
 *
 * This source file is available under two different licenses:
 *  - GNU General Public License version 3 (GPLv3)
 *  - CoreShop Commercial License (CCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) CoreShop GmbH (https://www.coreshop.org)
 * @license    https://www.coreshop.org/license     GPLv3 and CCL
 *
 */

namespace CoreShop\Component\SEO\Extractor;

use CoreShop\Component\SEO\Model\SEOAwareInterface;
use CoreShop\Component\SEO\Model\SEOMetadataInterface;
use Webmozart\Assert\Assert;

final class DescriptionExtractor implements ExtractorInterface
{
    public function supports($object): bool
    {
        return $object instanceof SEOAwareInterface || method_exists($object, 'getMetaDescription');
    }

    public function updateMetadata($object, SEOMetadataInterface $seoMetadata): void
    {
        Assert::isInstanceOf($object, SEOAwareInterface::class);

        /**
         * @var SEOAwareInterface $object
         */
        if ($object->getMetaDescription()) {
            $seoMetadata->setMetaDescription($object->getMetaDescription());
        }
    }
}
