<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Zend_GData
 */

namespace ZendGData\Spreadsheets;

use ZendGData\Spreadsheets;

/**
 * @category   Zend
 * @package    Zend_Gdata
 * @subpackage Spreadsheets
 */
class SpreadsheetFeed extends \ZendGData\Feed
{

    /**
     * The classname for individual feed elements.
     *
     * @var string
     */
    protected $_entryClassName = 'ZendGData\Spreadsheets\SpreadsheetEntry';

    /**
     * The classname for the feed.
     *
     * @var string
     */
    protected $_feedClassName = 'ZendGData\Spreadsheets\SpreadsheetFeed';

    /**
     * Constructs a new Zend_Gdata_Spreadsheets_SpreadsheetFeed object.
     * @param DOMElement $element (optional) The DOMElement on which to base this object.
     */
    public function __construct($element = null)
    {
        $this->registerAllNamespaces(Spreadsheets::$namespaces);
        parent::__construct($element);
    }

}
