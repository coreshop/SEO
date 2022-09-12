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

namespace CoreShop\Component\SEO\Model;

interface PimcoreSEOAwareInterface extends SEOAwareInterface
{
    public function getPimcoreMetaTitle(?string $language = null): ?string;

    public function setPimcoreMetaTitle(?string $pimcoreMetaTitle, ?string $language = null);

    public function getPimcoreMetaDescription(?string $language = null): ?string;

    public function setPimcoreMetaDescription(?string $pimcoreMetaDescription, ?string $language = null);
}
