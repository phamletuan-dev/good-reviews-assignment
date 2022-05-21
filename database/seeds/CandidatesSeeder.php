<?php

use Illuminate\Database\Seeder;
use App\Models\Candidate;

class CandidatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Candidate::class, 10)->create();
    }
}
