<?php

namespace HireMe\Repositories;

use HireMe\Entities\Candidate;

class CandidateRepo extends BaseRepo {

    public function getModel()
    {
        return new Candidate;
    }

} 