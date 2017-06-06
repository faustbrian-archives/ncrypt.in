<?php

/*
 * This file is part of nCrypt.in PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\nCrypt\Request\Modifiers;

use BrianFaust\Contracts\HttpClient;
use BrianFaust\Modifiers\AbstractModifier;

class AuthCodeModifier extends AbstractModifier
{
    public function apply()
    {
        $authCode = $this->httpClient->getConfig('authCode');

        $this->httpClient->addQuery('auth_code', $authCode);

        return $this->httpClient;
    }
}
