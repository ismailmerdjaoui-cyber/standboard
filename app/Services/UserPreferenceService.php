<?php

namespace App\Services;

use App\Models\UserPreference;

class UserPreferenceService extends BaseCrudService
{
    public function __construct(UserPreference $userPreference)
    {
        parent::__construct($userPreference);
    }
}
