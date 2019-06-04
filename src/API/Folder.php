<?php

declare(strict_types=1);

/*
 * This file is part of nCrypt.in PHP Client.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plients\Ncryptin\API;

use Plients\Http\HttpResponse;

class Folder extends AbstractAPI
{
    /**
     * @param string $foldername
     * @param array  $links
     * @param array  $parameters
     *
     * @return \Plients\Http\HttpResponse
     */
    public function create(string $foldername, array $links, array $parameters = []): HttpResponse
    {
        $links = implode("\n", $links);

        foreach ($parameters as $key => $value) {
            if (strpos($key, 'mirror[]')) {
                $parameters[$key] = implode("\n", $value);
            }
        }

        return $this->post('api.php', compact('foldername', 'links') + $parameters);
    }

    /**
     * @param string $link
     *
     * @return \Plients\Http\HttpResponse
     */
    public function status(string $link): HttpResponse
    {
        return $this->post('api_status.php', compact('link'));
    }

    /**
     * @param string $folder_id
     * @param array  $options
     *
     * @return \Plients\Http\HttpResponse
     */
    public function edit(string $folder_id, array $options): HttpResponse
    {
        return $this->post('api_edit.php', compact('folder_id') + $options);
    }

    /**
     * @param string $link
     *
     * @return \Plients\Http\HttpResponse
     */
    public function updateLink(string $link): HttpResponse
    {
        return $this->post('api_update_link.php', compact('link'));
    }
}
