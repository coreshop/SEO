<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) CoreShop GmbH (https://www.coreshop.org)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
 */

declare(strict_types=1);

namespace CoreShop\Component\SEO\Extractor;

use CoreShop\Component\SEO\Model\SEOImageAwareInterface;
use CoreShop\Component\SEO\Model\SEOMetadataInterface;
use Pimcore\Model\Asset\Image;
use Pimcore\Tool;
use Webmozart\Assert\Assert;

final class ImageExtractor implements ExtractorInterface
{
    public function supports($object): bool
    {
        return $object instanceof SEOImageAwareInterface &&
            $object->getImage() instanceof Image;
    }

    public function updateMetadata($object, SEOMetadataInterface $seoMetadata): void
    {
        /**
         * @var SEOImageAwareInterface $object
         */
        Assert::isInstanceOf($object, SEOImageAwareInterface::class);

        /**
         * @var Image\Thumbnail $thumbnail
         */
        $thumbnail = $object->getImage()->getThumbnail('coreshop_seo');
        $path = $thumbnail->getPath();

        if (str_starts_with($path, 'http')) {
            $ogImage = $path;
        }
        else {
            $ogImage = Tool::getHostUrl() . $path;
        }

        $seoMetadata->addExtraProperty('og:image', $ogImage);
    }
}
