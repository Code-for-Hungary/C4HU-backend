<?php

namespace App\Traits;

trait UserRequestHandler {

    private function getUserDataFromRequestData($req) {
        if (array_key_exists('user', $req)) {
            return $req['user'];
        }
        return [];
    }
}
