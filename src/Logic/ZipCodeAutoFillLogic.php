<?php

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
