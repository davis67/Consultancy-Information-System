<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $guarded = [];

    public static function serviceLines()
    {
        return [
            'Monitoring and Evaluation',
            'Recruitment Services',
            'HR Services', 'TCB Services',
            'Outsourced Financial Services',
            'ICT or MIS Services',
            'Procurement Services',
            'Public Sector Management Services',
            'IS Audits',
            'ACL',
            'Enterprise Risk Management',
            'Local Government',
            'Management consultancy',
            'Financial Advisory',
            'Pre qualification for Consultancy Services',
            'Business Development',
            'Infrastructure Consultancy',
            'Service Activities(Indirect Services)',
        ];
    }
}
