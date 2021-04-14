<?php

namespace App\Traits;

trait UserRequestHandler {

    public function getUserDataFromRequestData($req) {
        if (array_key_exists('user', $req)) {
            return $req['user'];
        }
        return [];
    }
}
