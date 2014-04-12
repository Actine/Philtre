<?php
/**
 * @author pdanyliuk
 * Date: 06.03.14
 * Time: 0:53
 */

namespace Actinarium\Philtre\Core;

use Actinarium\Philtre\Core\Exceptions\FilterProcessingException;

interface Filter
{
    /**
     * Each filter must implement a constructor that accepts configuration and mandatory FilterContext. Filters should
     * not look up for configuration themselves, but PipelineManagers should pass it to them.
     *
     * @param FilterContext     $filterContext Mandatory filter context
     * @param array|object|null $configuration Configuration passed to filter in any expected form
     *
     * @return \Actinarium\Philtre\Core\Filter
     */
    public function __construct(FilterContext $filterContext, $configuration = null);

    /**
     * This method should contain the logic that reads data from context, processes, and puts data back to context.
     * For I/O it should use provided context rather than accept or return anything, however this is not forbidden,
     * especially for custom PipelineManager implementations. In case of failure the method should throw
     * {@link FilterProcessingException}.
     *
     * @return void|mixed
     * @throws FilterProcessingException
     */
    public function process();
} 
