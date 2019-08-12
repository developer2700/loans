<?php

namespace App\Util\Paginate;

use Illuminate\Database\Eloquent\Builder;

class Paginate
{
    /**
     * Total count of the items.
     *
     * @var int
     */
    protected $total;

    /**
     * current page .
     *
     * @var int
     */
    protected $page;


    /**
     * limit result.
     *
     * @var int
     */
    protected $limit;


    /**
     * Collection of items.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $data;

    /**
     * Paginate constructor.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param int $limit
     * @param int $offset
     */
    public function __construct(Builder $builder, $limit = 20, $offset = 0)
    {
        $limit = request()->get('limit', $limit);
        $offset = request()->get('page', $offset);

        $this->page = $offset;
        $this->total = $builder->count();
        $this->limit = $limit;

        $this->data = $builder->orderBy('id','desc')->skip($offset)->take($limit)->get();
    }

    /**
     * Get the total count of the items.
     *
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Get the limit result.
     *
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Get the current page offset.
     *
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Get the paginated collection of items.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getData()
    {
        return $this->data;
    }
}