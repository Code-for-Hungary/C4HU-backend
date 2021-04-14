<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SkillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $ret = parent::toArray($request);
        $ret['skillgroup'] = new SkillgroupResource($this->skillgroup);
        if ($this->pivot) {
            $ret['skilllevel'] = new SkilllevelResource($this->pivot->skilllevel);
        }
        return $ret;
    }
}
