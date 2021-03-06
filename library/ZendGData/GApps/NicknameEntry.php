<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Zend_GData
 */

namespace ZendGData\GApps;

use ZendGData\GApps;

/**
 * Data model class for a Google Apps Nickname Entry.
 *
 * Each nickname entry describes a single nickname within a Google Apps
 * hosted domain. Each user may own several nicknames, but each nickname may
 * only belong to one user. Multiple entries are contained within instances
 * of Zend_Gdata_GApps_NicknameFeed.
 *
 * To transfer nickname entries to and from the Google Apps servers,
 * including creating new entries, refer to the Google Apps service class,
 * Zend_Gdata_GApps.
 *
 * This class represents <atom:entry> in the Google Data protocol.
 *
 * @category   Zend
 * @package    Zend_Gdata
 * @subpackage GApps
 */
class NicknameEntry extends \ZendGData\Entry
{

    protected $_entryClassName = 'ZendGData\GApps\NicknameEntry';

    /**
     * <apps:login> element used to hold information about the owner
     * of this nickname, including their username.
     *
     * @var \ZendGData\GApps\Extension\Login
     */
    protected $_login = null;

    /**
     * <apps:nickname> element used to hold the name of this nickname.
     *
     * @var \ZendGData\GApps\Extension\Nickname
     */
    protected $_nickname = null;

    /**
     * Create a new instance.
     *
     * @param DOMElement $element (optional) DOMElement from which this
     *          object should be constructed.
     */
    public function __construct($element = null)
    {
        $this->registerAllNamespaces(GApps::$namespaces);
        parent::__construct($element);
    }

    /**
     * Retrieves a DOMElement which corresponds to this element and all
     * child properties.  This is used to build an entry back into a DOM
     * and eventually XML text for application storage/persistence.
     *
     * @param DOMDocument $doc The DOMDocument used to construct DOMElements
     * @return DOMElement The DOMElement representing this element and all
     *          child properties.
     */
    public function getDOM($doc = null, $majorVersion = 1, $minorVersion = null)
    {
        $element = parent::getDOM($doc, $majorVersion, $minorVersion);
        if ($this->_login !== null) {
            $element->appendChild($this->_login->getDOM($element->ownerDocument));
        }
        if ($this->_nickname !== null) {
            $element->appendChild($this->_nickname->getDOM($element->ownerDocument));
        }
        return $element;
    }

    /**
     * Creates individual Entry objects of the appropriate type and
     * stores them as members of this entry based upon DOM data.
     *
     * @param DOMNode $child The DOMNode to process
     */
    protected function takeChildFromDOM($child)
    {
        $absoluteNodeName = $child->namespaceURI . ':' . $child->localName;

        switch ($absoluteNodeName) {
            case $this->lookupNamespace('apps') . ':' . 'login';
                $login = new Extension\Login();
                $login->transferFromDOM($child);
                $this->_login = $login;
                break;
            case $this->lookupNamespace('apps') . ':' . 'nickname';
                $nickname = new Extension\Nickname();
                $nickname->transferFromDOM($child);
                $this->_nickname = $nickname;
                break;
            default:
                parent::takeChildFromDOM($child);
                break;
        }
    }

    /**
     * Get the value of the login property for this object.
     *
     * @see setLogin
     * @return \ZendGData\GApps\Extension\Login The requested object.
     */
    public function getLogin()
    {
        return $this->_login;
    }

    /**
     * Set the value of the login property for this object. This property
     * is used to store the username address of the current user.
     *
     * @param \ZendGData\GApps\Extension\Login $value The desired value for
     *          this instance's login property.
     * @return \ZendGData\GApps\NicknameEntry Provides a fluent interface.
     */
    public function setLogin($value)
    {
        $this->_login = $value;
        return $this;
    }

    /**
     * Get the value of the nickname property for this object.
     *
     * @see setNickname
     * @return \ZendGData\GApps\Extension\Nickname The requested object.
     */
    public function getNickname()
    {
        return $this->_nickname;
    }

    /**
     * Set the value of the nickname property for this object. This property
     * is used to store the the name of the current nickname.
     *
     * @param \ZendGData\GApps\Extension\Nickname $value The desired value for
     *          this instance's nickname property.
     * @return \ZendGData\GApps\NicknameEntry Provides a fluent interface.
     */
    public function setNickname($value)
    {
        $this->_nickname = $value;
        return $this;
    }

}
