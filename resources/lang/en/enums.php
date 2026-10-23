<?php

declare(strict_types=1);

return [
    'moderation_status' => [
        'pending' => [
            'label' => 'Pending',
            'description' => 'Awaiting moderation.',
        ],
        'approved' => [
            'label' => 'Approved',
            'description' => 'Approved for publication.',
        ],
        'rejected' => [
            'label' => 'Rejected',
            'description' => 'Rejected and not approved for publication.',
        ],
        'flagged' => [
            'label' => 'Flagged',
            'description' => 'Flagged for manual review.',
        ],
    ],
];
