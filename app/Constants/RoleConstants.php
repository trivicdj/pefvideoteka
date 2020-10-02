<?php

namespace App\Constants;

class RoleConstants {
    const ADMIN = 'admin';
    const MODERATOR = 'moderator';
    const VISITOR = 'visitor';

    const ROLES = [
        self::ADMIN,
        self::MODERATOR,
        self::VISITOR
    ];
}
