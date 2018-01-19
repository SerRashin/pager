<?php

declare(strict_types = 1);

namespace Ser\Pager;

use PHPUnit\Framework\TestCase;

/**
 * Страница
 *
 * @package Ser\Pager
 */
class PageTest extends TestCase
{
    /**
     * Поведение при некорректном номере страницы
     *
     * @expectedException \Ser\Pager\Exception\InvalidArgumentException
     */
    public function testInvalidPage(): void
    {
        new Page(-1, 1);
    }

    /**
     * Поведение при некорректном количестве записей на страницу
     *
     * @expectedException \Ser\Pager\Exception\InvalidArgumentException
     */
    public function testInvalidLimit(): void
    {
        new Page(1, -1);
    }

    /**
     * Получение номера страницы
     */
    public function testPage(): void
    {
        $page = new Page(3, 6);
        $this->assertEquals(3, $page->getPage());
    }

    /**
     * Получение количества записей
     */
    public function testCount(): void
    {
        $page = new Page(3, 6);
        $this->assertEquals(6, $page->getLimit());
    }

    /**
     * Получение сдвига по элементам
     */
    public function testOffset(): void
    {
        $page = new Page(3, 6);
        $this->assertEquals(12, $page->getOffset());
    }
}
