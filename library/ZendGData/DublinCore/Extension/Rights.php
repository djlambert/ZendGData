<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Zend_GData
 */

namespace ZendGData\DublinCore\Extension;

/**
 * Information about rights held in and over the resource
 *
 * @category   Zend
 * @package    Zend_Gdata
 * @subpackage DublinCore
 */
class Rights extends \ZendGData\Extension
{

    protected $_rootNamespace = 'dc';
    protected $_rootElement = 'rights';

    /**
     * Constructor for Zend_Gdata_DublinCore_Extension_Rights which
     * Information about rights held in and over the resource
     *
     * @param DOMElement $element (optional) DOMElement from which this
     *          object should be constructed.
     */
    public function __construct($value = null)
    {
        $this->registerAllNamespaces(\ZendGData\DublinCore::$namespaces);
        parent::__construct();
        $this->_text = $value;
    }

}
