<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Task extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'task_name'=>$this->task_name,
            'task_status'=>$this->task_status,
            'priority'=>$this->priority,
            'service_line'=>$this->service_line,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            'team'=>$this->team,
            'start_time'=>$this->start_time,
            'end_time'=>$this->end_time,
            'related_to'=>$this->related_to,
            'description'=>$this->description,
            'assigned_to'=>$this->assigned_to
        ];
    }
}
