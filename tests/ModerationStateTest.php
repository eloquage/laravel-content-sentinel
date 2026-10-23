<?php

declare(strict_types=1);

use IllumaLaw\ContentSentinel\States\ModerationApproved;
use IllumaLaw\ContentSentinel\States\ModerationFlagged;
use IllumaLaw\ContentSentinel\States\ModerationPending;
use IllumaLaw\ContentSentinel\States\ModerationRejected;
use Illuminate\Database\Eloquent\Model;

it('provides translated labels and Filament metadata for moderation states', function () {
    $model = new class extends Model {};

    $cases = [
        [new ModerationPending($model), 'Pending', 'Awaiting moderation.', 'gray'],
        [new ModerationApproved($model), 'Approved', 'Approved for publication.', 'success'],
        [new ModerationRejected($model), 'Rejected', 'Rejected and not approved for publication.', 'danger'],
        [new ModerationFlagged($model), 'Flagged', 'Flagged for manual review.', 'warning'],
    ];

    foreach ($cases as [$state, $label, $description, $color]) {
        expect($state->getLabel())->toBe($label)
            ->and($state->getDescription())->toBe($description)
            ->and($state->getColor())->toBe($color)
            ->and($state->getIcon())->not->toBeNull();
    }
});
