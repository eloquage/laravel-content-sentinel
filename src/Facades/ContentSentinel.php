<?php

declare(strict_types=1);

namespace IllumaLaw\ContentSentinel\Facades;

use IllumaLaw\ContentSentinel\ContentSentinel as BaseContentSentinel;
use IllumaLaw\ContentSentinel\DTOs\SafeguardResult;
use IllumaLaw\ContentSentinel\DTOs\SentinelPayload;
use Illuminate\Support\Facades\Facade;

/**
 * @see BaseContentSentinel
 *
 * @method static SafeguardResult check(SentinelPayload $payload)
 */
class ContentSentinel extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return BaseContentSentinel::class;
    }
}
