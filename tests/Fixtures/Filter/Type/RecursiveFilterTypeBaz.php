<?php

declare(strict_types=1);

namespace Kreyu\Bundle\DataTableBundle\Tests\Fixtures\Filter\Type;

use Kreyu\Bundle\DataTableBundle\Filter\Type\AbstractFilterType;

class RecursiveFilterTypeBaz extends AbstractFilterType
{
    public function getParent(): ?string
    {
        return RecursiveFilterTypeFoo::class;
    }
}
