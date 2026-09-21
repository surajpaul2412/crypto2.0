<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

/**
 * Seeds the "Crypto Cipher Family" roster from static-site/12_about.html.
 * The static page only had placeholder names/bios, so the same placeholders
 * are used here — edit real names and bios in the admin panel.
 */
class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            ['01', 'Sitar · Sarod'],
            ['02', 'Tabla · Percussion'],
            ['03', 'Recording Director'],
            ['04', 'Producer'],
            ['05', 'Producer · Editing'],
            ['06', 'Project Manager'],
            ['07', 'Lead Instructor · Academy'],
            ['01', 'Live-Sound Engineering'],
        ];

        foreach ($members as $i => [$image, $designation]) {
            TeamMember::updateOrCreate(
                ['sort_order' => $i],
                [
                    'name' => '[Name]',
                    'designation' => $designation,
                    'description' => 'A short bio goes here — role, instruments, and a line of background. Editable per person in the backend.',
                    'image_path' => "frontend/assets/img/family/{$image}.jpg",
                    'is_active' => true,
                ]
            );
        }
    }
}
