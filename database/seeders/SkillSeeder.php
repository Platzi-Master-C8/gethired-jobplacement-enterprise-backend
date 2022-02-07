<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createSkills();
    }

    private function createSkills()
    {
        $skills = $this->getSkills();

        foreach ($skills as $skill) {
            Skill::create([
                'name' => $skill,
            ]);
        }
    }

    public function getSkills()
    {
        return [
            'javascript',
            'html',
            'css',
            'python',
            'sql',
            'java',
            'nodejs',
            'typescript',
            'c#',
            'bash/shell',
            'c++',
            'php',
            'c',
            'powershell',
            'go',
            'kotlin',
            'rust',
            'ruby',
            'dart',
            'assembly',
            'swift',
            'r',
            'vba',
            'matlab',
            'groovy',
            'objective-c',
            'scala',
            'perl',
            'haskell',
            'delphi',
            'clojure',
            'elixir',
            'lisp',
            'julia',
            'f#',
            'erlang',
            'apl',
            'crystal',
            'cobol',
            'mysql',
            'postgresql',
            'sqlite',
            'mongodb',
            'microsoft sql server',
            'redis',
            'mariadb',
            'firebase',
            'elasticsearch',
            'oracle',
            'dynamodb',
            'cassandra',
            'ibm db2',
            'couchbase',
            'aws',
            'google cloud platform',
            'microsoft azure',
            'heroku',
            'digitalocean',
            'ibm cloud or watson',
            'oracle cloud infrastructure',
            'react.js',
            'jquery',
            'express',
            'angular',
            'vue.js',
            'asp.net core',
            'flask',
            'asp.net',
            'django',
            'spring',
            'angular.js',
            'laravel',
            'ruby on rails',
            'gatsby',
            'fastapi',
            'symfony',
            'svelte',
            'drupal',
            '.net framework',
            'numpy',
            '.net core / .net 5',
            'pandas',
            'tensorflow',
            'react native',
            'flutter',
            'keras',
            'qt',
            'torch/pytorch',
            'cordova',
            'apache spark',
            'hadoop',
            'git',
            'docker',
            'yarn',
            'kubernetes',
            'unity 3d',
            'ansible',
            'terraform',
            'xamarin',
            'unreal engine',
            'puppet',
            'deno',
            'chef',
            'flow',
            'pulumi',
        ];
    }
}
