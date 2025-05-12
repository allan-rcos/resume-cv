<?php

namespace Database\Seeders;

use App\Models\Award;
use App\Models\Certification;
use App\Models\Education;
use App\Models\Employment;
use App\Models\Highlight;
use App\Models\Language;
use App\Models\Link;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;

/**
 * A seeder to populate a test database.
 * Have UserData, Skills, Projects, Links, Languages, Highlights, Employments, Education, Certification and
 * Awards Factories. Fake users too.
 */
class UserDataSeeder extends Seeder
{
    /** @var int Number of users created; */
    private int $users = 5;

    /** @var ?int Number of skills created foreach user, if null, nothing is created; */
    private ?int $skill_for_user = 5;
    /** @var ?int Number of projects created foreach user, if null, nothing is created; */
    private ?int $project_for_user = 2;
    /** @var ?int Number of links created foreach user, if null, nothing is created; */
    private ?int $link_for_user = 2;
    /** @var ?int Number of languages created foreach user, if null, nothing is created; */
    private ?int $language_for_user = 2;
    /** @var ?int Number of employments created foreach user, if null, nothing is created; */
    private ?int $employment_for_user = 2;
    /** @var ?int Number of education created foreach user, if null, nothing is created; */
    private ?int $education_for_user = 2;
    /** @var ?int Number of certification created foreach user, if null, nothing is created; */
    private ?int $certification_for_user = 2;
    /** @var ?int Number of awards created foreach user, if null, nothing is created; */
    private ?int $award_for_user = 3;
    /** @var ?int Number of highlights created foreach user, if null, nothing is created; */
    private ?int $highlight_for_user = null;
    /** @var ?int Number of highlights created foreach project, if null, nothing is created; */
    private ?int $highlight_for_project = 4;
    /** @var ?int Number of highlights created foreach employment, if null, nothing is created; */
    private ?int $highlight_for_employment = 4;
    /** @var ?int Number of highlights created foreach education, if null, nothing is created; */
    private ?int $highlight_for_education = 2;
    /** @var ?int Number of highlights created foreach certification, if null, nothing is created; */
    private ?int $highlight_for_certification = 2;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory($this->users)
            ->has(UserData::factory());

        $hasHighlights = function (?int $number, Factory $factory, Factory $user): Factory {
            if ($number !== null || $this->highlight_for_user !== null)
                $factory = $factory->has(Highlight::factory()->count($number??$this->highlight_for_user));
            return $user->has($factory);
        };

        if($this->skill_for_user !== null)
            $user = $user->has(Skill::factory()->count($this->skill_for_user));
        if($this->link_for_user !== null)
            $user = $user->has(Link::factory()->count($this->link_for_user));
        if($this->language_for_user !== null)
            $user = $user->has(Language::factory()->count($this->language_for_user));
        if($this->award_for_user !== null)
            $user = $user->has(Award::factory()->count($this->award_for_user));

        if($this->project_for_user !== null)
            $user = $hasHighlights($this->highlight_for_project, Project::factory()->count($this->project_for_user), $user);
        if($this->employment_for_user !== null)
            $user = $hasHighlights($this->highlight_for_employment, Employment::factory()->count($this->employment_for_user), $user);
        if($this->education_for_user !== null)
            $user = $hasHighlights($this->highlight_for_education, Education::factory()->count($this->education_for_user), $user);
        if($this->certification_for_user !== null)
            $user = $hasHighlights($this->highlight_for_certification, Certification::factory()->count($this->certification_for_user), $user);

        $user->create();
    }
}
