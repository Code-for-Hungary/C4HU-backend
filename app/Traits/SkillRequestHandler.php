<?php

namespace App\Traits;

trait SkillRequestHandler {

    private function getSkillDataFromRequestData($req) {
        if (array_key_exists('skills', $req)) {
            $ret = [];
            foreach ($req['skills'] as $skill) {
                $ret[$skill['skill_id']] = ['skilllevel_id' => $skill['skilllevel_id']];
            }
            return $ret;
        }
        return false;
    }
}
