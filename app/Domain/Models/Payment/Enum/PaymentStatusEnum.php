<?php declare(strict_types=1);

namespace App\Domain\Models\Payment\Enum;

use BenSampo\Enum\Enum;

final class PaymentStatusEnum extends Enum
{
    const created = 'created';
    const in_progress = 'in_progress';
    const success = 'success';
    const failure = 'failure';

    public function label(): string
    {
        return match ($this->value) {
            self::created => 'Платеж создан',
            self::in_progress => 'В процессе оплаты',
            self::success => 'Платеж оплачен',
            self::failure => 'Платеж отменен',
        };
    }
}
