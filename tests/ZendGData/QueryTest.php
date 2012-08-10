<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Zend_GData
 */

namespace ZendGDataTest;

use ZendGData;

/**
 * @category   Zend
 * @package    Zend_GData
 * @subpackage UnitTests
 * @group      Zend_GData
 */
class QueryTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
    }

    public function testSetAndGetAlt()
    {
        $query = new ZendGData\Query();
        $query->setAlt('rss');
        $this->assertEquals('rss', $query->alt);
        $this->assertContains('alt=rss', $query->getQueryUrl());
    }

    public function testSetAndGetUpdatedMax()
    {
        $query = new ZendGData\Query();
        $query->setUpdatedMax('2007-01-01');
        $this->assertEquals('2007-01-01', $query->getUpdatedMax());
        $this->assertContains('updated-max=2007-01-01', $query->getQueryUrl());
    }

    public function testSetAndGetUpdatedMin()
    {
        $query = new ZendGData\Query();
        $query->setUpdatedMin('2007-01-01');
        $this->assertEquals('2007-01-01', $query->getUpdatedMin());
        $this->assertContains('updated-min=2007-01-01', $query->getQueryUrl());
    }

    public function testSetAndGetPublishedMax()
    {
        $query = new ZendGData\Query();
        $query->setPublishedMax('2007-01-01');
        $this->assertEquals('2007-01-01', $query->getPublishedMax());
        $this->assertContains('published-max=2007-01-01',
            $query->getQueryUrl());
    }

    public function testSetAndGetPublishedMin()
    {
        $query = new ZendGData\Query();
        $query->setPublishedMin('2007-01-01');
        $this->assertEquals('2007-01-01', $query->getPublishedMin());
        $this->assertContains('published-min=2007-01-01',
                $query->getQueryUrl());
    }

    public function testSetAndGetAuthor()
    {
        $query = new ZendGData\Query();
        $query->setAuthor('My Name');
        $this->assertEquals('My Name', $query->getAuthor());
        $this->assertContains('author=My+Name', $query->getQueryUrl());
    }

    public function testSetAndGetMaxResults()
    {
        $query = new ZendGData\Query();
        $query->setMaxResults('300');
        $this->assertEquals('300', $query->getMaxResults());
        $this->assertContains('max-results=300', $query->getQueryUrl());
    }

    public function testSetAndGetGenericParam()
    {
        $query = new ZendGData\Query();
        $query->setParam('fw', 'zend');
        $this->assertEquals('zend', $query->getParam('fw'));
        $this->assertContains('fw=zend', $query->getQueryUrl());
    }

    public function testSetAndGetFullTextQuery()
    {
        $query = new ZendGData\Query();
        $query->setQuery('geek events');
        $this->assertEquals('geek events', $query->getQuery());
        $this->assertContains('q=geek+events', $query->getQueryUrl());
    }

    public function testSetAndGetStartIndex()
    {
        $query = new ZendGData\Query();
        $query->setStartIndex(12);
        $this->assertEquals(12, $query->getStartIndex());
        $this->assertContains('start-index=12', $query->getQueryUrl());
    }

}
