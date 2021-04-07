<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
        $ret['status'] = new ProjectstatusResource($this->status);
        $ret['owner'] = new ProjectownerResource($this->owner);

        $ret['types'] = TypeResource::collection($this->types);
        $ret['skillgroups'] = SkillgroupResource::collection($this->skillgroups);
        $ret['categories'] = CategoryResource::collection($this->categories);
        $ret['skills'] = SkillResource::collection($this->skills);

        return $ret;
    }
}
