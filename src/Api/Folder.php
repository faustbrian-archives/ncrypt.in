<?php

/*
 * This file is part of nCrypt.in PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Ncryptin\Api;

use BrianFaust\Unified\AbstractApi;

class Folder extends AbstractApi
{
    public function create($foldername, $links, $optional = [])
    {
        $links = implode("\n", $links);

        foreach ($optional as $key => $value) {
            if (strpos($key, 'mirror[]')) {
                $optional[$key] = implode("\n", $value);
            }
        }

        $this->setFormParameters(array_merge(compact('foldername', 'links'), $optional));

        $response = $this->post(null);

// http://ncrypt.in/folder-yI7Dm6Eu
// http://ncrypt.in/status-OfQrClOQR8RJyjl1pixNWInp5YCXpA3ik2k-VRawoa8=

        return $response;
    }

    public function status($link)
    {
        $this->setFormParameters(compact('link'));

        $response = $this->post('_status');
        $response = explode(';', $response);

        return [
            'status' => $response[0],
            'host' => $response[1],
            'filesize' => $response[2],
            'parts' => $response[3],
            'title' => $response[4],
        ];
    }

    public function edit($id, $options)
    {
        $this->setFormParameters(array_merge(['folder_id' => $id], $options));

        return $this->post('_edit');
    }

    public function updateLink($link)
    {
        $this->setFormParameters(compact('link'));

        return $this->post('_update_link');
    }
}
