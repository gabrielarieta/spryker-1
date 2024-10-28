<?php

namespace Pyz\Zed\Oms\Communication\Plugin\Command\CustomOrderProcess;

use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Spryker\Zed\Oms\Business\Util\ReadOnlyArrayObject;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Command\AbstractCommand;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Command\CommandByOrderInterface;

class ShipOrderCommand extends AbstractCommand implements CommandByOrderInterface
{

    public function run(array $orderItems, SpySalesOrder $orderEntity, ReadOnlyArrayObject $data): array
    {
        return [];
    }
}
