<?php

declare(strict_types=1);

namespace IllumaLaw\ContentSentinel\States;

use BackedEnum;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Icons\Heroicon;
use IllumaLaw\ContentSentinel\States\Concerns\ReceivesOptionalStateConfig;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

/** @extends State<Model> */
abstract class ModerationState extends State implements HasColor, HasDescription, HasIcon, HasLabel
{
    use ReceivesOptionalStateConfig;

    public static function config(): StateConfig
    {
        return parent::config()
            ->default(ModerationPending::class)
            ->allowAllTransitions();
    }

    public function getLabel(): string|Htmlable|null
    {
        $group = 'moderation_status';

        return __("content-sentinel::enums.{$group}.{$this->getValue()}.label");
    }

    public function getDescription(): string|Htmlable|null
    {
        $group = 'moderation_status';

        return __("content-sentinel::enums.{$group}.{$this->getValue()}.description");
    }

    public function getIcon(): string|BackedEnum|Htmlable|null
    {
        return match ($this->getValue()) {
            'pending' => Heroicon::OutlinedClock,
            'approved' => Heroicon::OutlinedCheckCircle,
            'rejected' => Heroicon::OutlinedXCircle,
            'flagged' => Heroicon::OutlinedExclamationTriangle,
            default => null,
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this->getValue()) {
            'pending' => 'gray',
            'approved' => 'success',
            'rejected' => 'danger',
            'flagged' => 'warning',
            default => null,
        };
    }
}
