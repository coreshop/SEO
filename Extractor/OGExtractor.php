<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) CoreShop GmbH (https://www.coreshop.org)
 * @license    https://www.coreshop.org/license     GPLv3 and CCL
 */

declare(strict_types=1);

namespace CoreShop\Component\SEO\Extractor;

use CoreShop\Component\SEO\Model\SEOMetadataInterface;
use CoreShop\Component\SEO\Model\SEOOpenGraphAwareInterface;
use Webmozart\Assert\Assert;

final class OGExtractor implements ExtractorInterface
{
    public function supports($object): bool
    {
        return $object instanceof SEOOpenGraphAwareInterface;
    }

    public function updateMetadata($object, SEOMetadataInterface $seoMetadata): void
    {
        /**
         * @var SEOOpenGraphAwareInterface $object
         */
        Assert::isInstanceOf($object, SEOOpenGraphAwareInterface::class);

        if ($object->getOGTitle()) {
            $seoMetadata->addExtraProperty('og:title', $object->getOGTitle());
        }

        if ($object->getOGDescription()) {
            $seoMetadata->addExtraProperty('og:description', $object->getOGDescription());
        }

        if ($object->getOGType()) {
            $seoMetadata->addExtraProperty('og:type', $object->getOGType());
        }
    }
}
