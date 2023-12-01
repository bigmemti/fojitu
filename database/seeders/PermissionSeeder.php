<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                "name"=> "view-list-course",
                "namespace" => "model.course",
            ],
            [
                "name"=> "view-teaching-list-course",
                "namespace" => "model.course",
            ],
            [
                "name"=> "view-member-list-course",
                "namespace" => "model.course",
            ],
            [
                "name"=> "view-studying-list-course",
                "namespace" => "model.course",
            ],
            [
                "name"=> "view-course",
                "namespace" => "model.course",
            ],
            [
                "name"=> "member-course",
                "namespace" => "model.course",
            ],
            [
                "name"=> "create-course",
                "namespace" => "model.course",
            ],
            [
                "name"=> "update-course",
                "namespace" => "model.course",
            ],
            [
                "name"=> "delete-course",
                "namespace" => "model.course",
            ],
            [
                "name"=> "restore-course",
                "namespace" => "model.course",
            ],
            [
                "name"=> "force-delete-course",
                "namespace" => "model.course",
            ],
            [
                "name"=> "view-list-curriculum",
                "namespace" => "model.curriculum",
            ],
            [
                "name"=> "view-curriculum",
                "namespace" => "model.curriculum",
            ],
            [
                "name"=> "create-curriculum",
                "namespace" => "model.curriculum",
            ],
            [
                "name"=> "update-curriculum",
                "namespace" => "model.curriculum",
            ],
            [
                "name"=> "delete-curriculum",
                "namespace" => "model.curriculum",
            ],
            [
                "name"=> "restore-curriculum",
                "namespace" => "model.curriculum",
            ],
            [
                "name"=> "force-delete-curriculum",
                "namespace" => "model.curriculum",
            ],
            [
                "name"=> "view-list-institution",
                "namespace" => "model.institution",
            ],
            [
                "name"=> "view-institution",
                "namespace" => "model.institution",
            ],
            [
                "name"=> "create-institution",
                "namespace" => "model.institution",
            ],
            [
                "name"=> "update-institution",
                "namespace" => "model.institution",
            ],
            [
                "name"=> "delete-institution",
                "namespace" => "model.institution",
            ],
            [
                "name"=> "restore-institution",
                "namespace" => "model.institution",
            ],
            [
                "name"=> "force-delete-institution",
                "namespace" => "model.institution",
            ],
            [
                "name"=> "view-list-major",
                "namespace" => "model.major",
            ],
            [
                "name"=> "view-major",
                "namespace" => "model.major",
            ],
            [
                "name"=> "create-major",
                "namespace" => "model.major",
            ],
            [
                "name"=> "update-major",
                "namespace" => "model.major",
            ],
            [
                "name"=> "delete-major",
                "namespace" => "model.major",
            ],
            [
                "name"=> "restore-major",
                "namespace" => "model.major",
            ],
            [
                "name"=> "force-delete-major",
                "namespace" => "model.major",
            ],
            [
                "name"=> "view-list-teacher-request",
                "namespace" => "model.teacher-request",
            ],
            [
                "name"=> "view-teacher-request",
                "namespace" => "model.teacher-request",
            ],
            [
                "name"=> "create-teacher-request",
                "namespace" => "model.teacher-request",
            ],
            [
                "name"=> "update-teacher-request",
                "namespace" => "model.teacher-request",
            ],
            [
                "name"=> "delete-teacher-request",
                "namespace" => "model.teacher-request",
            ],
            [
                "name"=> "restore-teacher-request",
                "namespace" => "model.teacher-request",
            ],
            [
                "name"=> "force-delete-teacher-request",
                "namespace" => "model.teacher-request",
            ],
            [
                "name"=> "view-list-type",
                "namespace" => "model.type",
            ],
            [
                "name"=> "view-type",
                "namespace" => "model.type",
            ],
            [
                "name"=> "create-type",
                "namespace" => "model.type",
            ],
            [
                "name"=> "update-type",
                "namespace" => "model.type",
            ],
            [
                "name"=> "delete-type",
                "namespace" => "model.type",
            ],
            [
                "name"=> "restore-type",
                "namespace" => "model.type",
            ],
            [
                "name"=> "force-delete-type",
                "namespace" => "model.type",
            ],
            [
                "name"=> "view-list-attendance",
                "namespace" => "model.attendance",
            ],
            [
                "name"=> "view-attendance",
                "namespace" => "model.attendance",
            ],
            [
                "name"=> "create-attendance",
                "namespace" => "model.attendance",
            ],
            [
                "name"=> "update-attendance",
                "namespace" => "model.attendance",
            ],
            [
                "name"=> "delete-attendance",
                "namespace" => "model.attendance",
            ],
            [
                "name"=> "restore-attendance",
                "namespace" => "model.attendance",
            ],
            [
                "name"=> "force-delete-attendance",
                "namespace" => "model.attendance",
            ],
            [
                "name"=> "view-list-fileable",
                "namespace" => "model.fileable",
            ],
            [
                "name"=> "view-fileable",
                "namespace" => "model.fileable",
            ],
            [
                "name"=> "create-fileable",
                "namespace" => "model.fileable",
            ],
            [
                "name"=> "update-fileable",
                "namespace" => "model.fileable",
            ],
            [
                "name"=> "delete-fileable",
                "namespace" => "model.fileable",
            ],
            [
                "name"=> "restore-fileable",
                "namespace" => "model.fileable",
            ],
            [
                "name"=> "force-delete-fileable",
                "namespace" => "model.fileable",
            ],
            [
                "name"=> "view-list-file",
                "namespace" => "model.file",
            ],
            [
                "name"=> "view-file",
                "namespace" => "model.file",
            ],
            [
                "name"=> "create-file",
                "namespace" => "model.file",
            ],
            [
                "name"=> "update-file",
                "namespace" => "model.file",
            ],
            [
                "name"=> "delete-file",
                "namespace" => "model.file",
            ],
            [
                "name"=> "restore-file",
                "namespace" => "model.file",
            ],
            [
                "name"=> "force-delete-file",
                "namespace" => "model.file",
            ],
            [
                "name"=> "view-list-homework",
                "namespace" => "model.homework",
            ],
            [
                "name"=> "view-homework",
                "namespace" => "model.homework",
            ],
            [
                "name"=> "create-homework",
                "namespace" => "model.homework",
            ],
            [
                "name"=> "update-homework",
                "namespace" => "model.homework",
            ],
            [
                "name"=> "delete-homework",
                "namespace" => "model.homework",
            ],
            [
                "name"=> "restore-homework",
                "namespace" => "model.homework",
            ],
            [
                "name"=> "force-delete-homework",
                "namespace" => "model.homework",
            ],
            [
                "name"=> "view-list-member",
                "namespace" => "model.member",
            ],
            [
                "name"=> "view-member",
                "namespace" => "model.member",
            ],
            [
                "name"=> "create-member",
                "namespace" => "model.member",
            ],
            [
                "name"=> "update-member",
                "namespace" => "model.member",
            ],
            [
                "name"=> "delete-member",
                "namespace" => "model.member",
            ],
            [
                "name"=> "restore-member",
                "namespace" => "model.member",
            ],
            [
                "name"=> "force-delete-member",
                "namespace" => "model.member",
            ],
            [
                "name"=> "view-list-mime",
                "namespace" => "model.mime",
            ],
            [
                "name"=> "view-mime",
                "namespace" => "model.mime",
            ],
            [
                "name"=> "create-mime",
                "namespace" => "model.mime",
            ],
            [
                "name"=> "update-mime",
                "namespace" => "model.mime",
            ],
            [
                "name"=> "delete-mime",
                "namespace" => "model.mime",
            ],
            [
                "name"=> "restore-mime",
                "namespace" => "model.mime",
            ],
            [
                "name"=> "force-delete-mime",
                "namespace" => "model.mime",
            ],
            [
                "name"=> "view-list-permission",
                "namespace" => "model.permission",
            ],
            [
                "name"=> "view-permission",
                "namespace" => "model.permission",
            ],
            [
                "name"=> "create-permission",
                "namespace" => "model.permission",
            ],
            [
                "name"=> "update-permission",
                "namespace" => "model.permission",
            ],
            [
                "name"=> "delete-permission",
                "namespace" => "model.permission",
            ],
            [
                "name"=> "restore-permission",
                "namespace" => "model.permission",
            ],
            [
                "name"=> "force-delete-permission",
                "namespace" => "model.permission",
            ],
            [
                "name"=> "view-list-practice",
                "namespace" => "model.practice",
            ],
            [
                "name"=> "view-practice",
                "namespace" => "model.practice",
            ],
            [
                "name"=> "create-practice",
                "namespace" => "model.practice",
            ],
            [
                "name"=> "update-practice",
                "namespace" => "model.practice",
            ],
            [
                "name"=> "delete-practice",
                "namespace" => "model.practice",
            ],
            [
                "name"=> "restore-practice",
                "namespace" => "model.practice",
            ],
            [
                "name"=> "force-delete-practice",
                "namespace" => "model.practice",
            ],
            [
                "name"=> "view-list-role",
                "namespace" => "model.role",
            ],
            [
                "name"=> "view-role",
                "namespace" => "model.role",
            ],
            [
                "name"=> "create-role",
                "namespace" => "model.role",
            ],
            [
                "name"=> "update-role",
                "namespace" => "model.role",
            ],
            [
                "name"=> "delete-role",
                "namespace" => "model.role",
            ],
            [
                "name"=> "restore-role",
                "namespace" => "model.role",
            ],
            [
                "name"=> "force-delete-role",
                "namespace" => "model.role",
            ],
            [
                "name"=> "view-list-session",
                "namespace" => "model.session",
            ],
            [
                "name"=> "view-session",
                "namespace" => "model.session",
            ],
            [
                "name"=> "create-session",
                "namespace" => "model.session",
            ],
            [
                "name"=> "update-session",
                "namespace" => "model.session",
            ],
            [
                "name"=> "delete-session",
                "namespace" => "model.session",
            ],
            [
                "name"=> "restore-session",
                "namespace" => "model.session",
            ],
            [
                "name"=> "force-delete-session",
                "namespace" => "model.session",
            ],
            [
                "name"=> "view-list-student",
                "namespace" => "model.student",
            ],
            [
                "name"=> "view-student",
                "namespace" => "model.student",
            ],
            [
                "name"=> "create-student",
                "namespace" => "model.student",
            ],
            [
                "name"=> "update-student",
                "namespace" => "model.student",
            ],
            [
                "name"=> "delete-student",
                "namespace" => "model.student",
            ],
            [
                "name"=> "restore-student",
                "namespace" => "model.student",
            ],
            [
                "name"=> "force-delete-student",
                "namespace" => "model.student",
            ],
            [
                "name"=> "view-list-submission",
                "namespace" => "model.submission",
            ],
            [
                "name"=> "view-submission",
                "namespace" => "model.submission",
            ],
            [
                "name"=> "create-submission",
                "namespace" => "model.submission",
            ],
            [
                "name"=> "update-submission",
                "namespace" => "model.submission",
            ],
            [
                "name"=> "delete-submission",
                "namespace" => "model.submission",
            ],
            [
                "name"=> "restore-submission",
                "namespace" => "model.submission",
            ],
            [
                "name"=> "force-delete-submission",
                "namespace" => "model.submission",
            ],
            [
                "name"=> "view-list-teacher",
                "namespace" => "model.teacher",
            ],
            [
                "name"=> "view-teacher",
                "namespace" => "model.teacher",
            ],
            [
                "name"=> "create-teacher",
                "namespace" => "model.teacher",
            ],
            [
                "name"=> "update-teacher",
                "namespace" => "model.teacher",
            ],
            [
                "name"=> "delete-teacher",
                "namespace" => "model.teacher",
            ],
            [
                "name"=> "restore-teacher",
                "namespace" => "model.teacher",
            ],
            [
                "name"=> "force-delete-teacher",
                "namespace" => "model.teacher",
            ],
            [
                "name"=> "view-list-topic",
                "namespace" => "model.topic",
            ],
            [
                "name"=> "view-topic",
                "namespace" => "model.topic",
            ],
            [
                "name"=> "create-topic",
                "namespace" => "model.topic",
            ],
            [
                "name"=> "update-topic",
                "namespace" => "model.topic",
            ],
            [
                "name"=> "delete-topic",
                "namespace" => "model.topic",
            ],
            [
                "name"=> "restore-topic",
                "namespace" => "model.topic",
            ],
            [
                "name"=> "force-delete-topic",
                "namespace" => "model.topic",
            ],
            [
                "name"=> "view-list-organization",
                "namespace" => "model.organization",
            ],
            [
                "name"=> "view-organization",
                "namespace" => "model.organization",
            ],
            [
                "name"=> "create-organization",
                "namespace" => "model.organization",
            ],
            [
                "name"=> "update-organization",
                "namespace" => "model.organization",
            ],
            [
                "name"=> "delete-organization",
                "namespace" => "model.organization",
            ],
            [
                "name"=> "restore-organization",
                "namespace" => "model.organization",
            ],
            [
                "name"=> "force-delete-organization",
                "namespace" => "model.organization",
            ],
            [
                "name"=> "view-list-ticket",
                "namespace" => "model.ticket",
            ],
            [
                "name"=> "view-ticket",
                "namespace" => "model.ticket",
            ],
            [
                "name"=> "create-ticket",
                "namespace" => "model.ticket",
            ],
            [
                "name"=> "update-ticket",
                "namespace" => "model.ticket",
            ],
            [
                "name"=> "delete-ticket",
                "namespace" => "model.ticket",
            ],
            [
                "name"=> "restore-ticket",
                "namespace" => "model.ticket",
            ],
            [
                "name"=> "force-delete-ticket",
                "namespace" => "model.ticket",
            ],
            // [
            //     "name"=> "",
            //     "namespace" => "model.curriculum",
            // ],
        ];

        DB::table("permissions")->upsert($permissions,['name'],['namespace', 'is_appointable' => 1]);

    }
}