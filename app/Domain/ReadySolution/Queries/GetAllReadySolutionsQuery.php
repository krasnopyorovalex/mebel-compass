<?php

namespace App\Domain\ReadySolution\Queries;

use App\ReadySolution;

/**
 * Class GetAllReadySolutionsQuery
 * @package App\Domain\ReadySolution\Queries
 */
class GetAllReadySolutionsQuery
{
    /**
     * @var bool
     */
    private $isPublished;

    /**
     * GetAllReadySolutionsQuery constructor.
     * @param bool $isPublished
     */
    public function __construct(bool $isPublished = false)
    {
        $this->isPublished = $isPublished;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $query = ReadySolution::with(['image'])->orderBy('published_at', 'desc');

        if ($this->isPublished) {
            $query->where('is_published', '1');
        }

        return $query->get();
    }
}