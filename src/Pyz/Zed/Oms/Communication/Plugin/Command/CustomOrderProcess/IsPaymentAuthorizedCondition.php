<?php

namespace Pyz\Zed\Oms\Communication\Plugin\Command\CustomOrderProcess;

use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Condition\AbstractCondition;
use Spryker\Zed\Oms\Dependency\Plugin\Condition\ConditionInterface;

class IsPaymentAuthorizedCondition extends AbstractCondition implements ConditionInterface
{

    public function check(SpySalesOrderItem $orderItem): bool
    {
        return true;
    }
}
