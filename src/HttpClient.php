<?php

/*
 * This file is part of nCrypt.in PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\nCrypt;

use BrianFaust\Unified\AbstractHttpClient;
use BrianFaust\nCrypt\Request\Modifiers\AuthCodeModifier;

class HttpClient extends AbstractHttpClient
{
    protected $options = [
        'headers' => [
           'User-Agent' => 'BrianFaust/nCrypt.in',
        ],
    ];

    protected $requestModifiers = [AuthCodeModifier::class];

    protected function buildRequestUri($baseUri, $path)
    {
        return sprintf('http://ncrypt.in/api%s.php', $path);
    }
}
