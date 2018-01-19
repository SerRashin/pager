<?php

declare(strict_types = 1);

namespace Ser\Pager;

use Ser\Pager\Exception\InvalidArgumentException;

/**
 * Страница
 *
 * @package Ser\Pager
 */
class Page
{
    /**
     * Страница
     *
     * @var int
     */
    private $page;

    /**
     * Количество записей на странице
     *
     * @var int
     */
    private $limit;

    /**
     * Сдвиг по элементам
     *
     * @var int
     */
    private $offset;

    /**
     * Конструктор
     *
     * @param int      $page
     * @param int|null $limit
     *
     * @throws InvalidArgumentException
     */
    public function __construct(int $page, int $limit = null)
    {
        if ($page < 1) {
            throw new InvalidArgumentException('Некорректный номер страницы');
        }

        if ($limit < 1) {
            throw new InvalidArgumentException('Некорректное число элементов на страницу');
        }

        $this->page   = $page;
        $this->limit  = $limit;
        $this->offset = ($page - 1) * $limit;
    }

    /**
     * Возвращает номер страницы
     *
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * Возвращает количество элементов на странице
     *
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * Возвращает сдвиг по элементам
     *
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }
}
