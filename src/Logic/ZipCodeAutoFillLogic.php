<?php
/**
 *  Copyright (c) 2021 seus31
 *  Released under the MIT license
 *  https://github.com/seus31/zip-code-auto-fill/blob/master/license.txt
 */

namespace Seus31\ZipCodeAutoFill\Logic;

use Seus31\ZipCodeAutoFill\Models\ZipCodeAutoFillZipCode;

class ZipCodeAutoFillLogic
{
    /**
     * @var ZipCodeAutoFillZipCode
     */
    private $zipCode;

    /**
     * ZipCodeAutoFillLogic constructor.
     *
     * @param ZipCodeAutoFillZipCode $zipCode
     */
    public function __construct(ZipCodeAutoFillZipCode $zipCode)
    {
        $this->zipCode = $zipCode;
    }
}
