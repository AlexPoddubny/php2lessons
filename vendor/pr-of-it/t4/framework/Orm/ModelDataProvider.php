<?php

namespace T4\Orm;
use T4\Core\Collection;
use T4\Core\IProvider;
use T4\Core\Std;

/**
 * Class ModelDataProvider
 * @package T4\Orm
 *
 * @property int $total
 * @property int $pageSize
 * @property \Generator $pages
 */
class ModelDataProvider
    extends Std
    implements IProvider
{

    /** @var \T4\Orm\Model */
    protected $class;

    protected $options = [];

    protected $pageSize = 0;

    protected $total = null;

    /**
     * @param string $class
     * @param array $options
     * @throws Exception
     */
    public function __construct($class = null, array $options = [])
    {
        if (!empty($class) && !(is_subclass_of($class, Model::class, true))) {
            throw new Exception('Invalid model class given');
        }
        if (!empty($class)) {
            $this->setClass($class);
        }
        if (!empty($options)) {
            $this->setOptions($options);
        }
    }

    /**
     * @param string $class
     * @return $this
     */
    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options = [])
    {
        $this->options = $options;
        $this->total = null;
        return $this;
    }

    /**
     * @param int $size
     * @return $this
     */
    public function setPageSize(int $size = 0) : IProvider
    {
        $this->pageSize = $size;
        return $this;
    }

    /**
     * @return int
     */
    public function getPageSize() : int
    {
        return $this->pageSize;
    }

    /**
     * @return int
     */
    public function getTotal() : int
    {
        if (null === $this->total) {
            $options = $this->options;
            $this->total = $this->class::countAll($options);
        }
        return $this->total;
    }

    /**
     * @return \Generator
     */
    public function getPages() : \Generator
    {
        $options = $this->options;

        if (0 != $this->pageSize) {
            $pages = ceil($this->getTotal() / $this->pageSize);
            $options['limit'] = $this->pageSize;
        } else {
            $pages = 1;
        }

        for ($i = 1; $i <= $pages; $i++) {
            if ($pages > 1) {
                $options['offset'] = ($i - 1) * $this->pageSize;
                yield $i => $this->class::findAll($options);
            }
        }
    }

    /**
     * @param int $n
     * @return \T4\Core\Collection
     */
    public function getPage(int $n) : Collection
    {
        $options = $this->options;

        if ($this->pageSize != 0) {
            $options['limit'] = $this->pageSize;
            $options['offset'] = ($n - 1) * $this->pageSize;
        }

        return $this->class::findAll($options);
    }

    public function getAll() : Collection
    {
        return $this->class::findAll($this->options);
    }

}