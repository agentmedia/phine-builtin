<?php
namespace Phine\Bundles\BuiltIn\Logic\Enums;
use Phine\Framework\System\Enum;
/**
 * Enumeration of the tag names for the block element
 */
class BlockTag  extends Enum
{
    /**
     * The block tag name "article"
     * @return BlockTag
     */
    static function Article()
    {
        return new self('article');
    }
    /**
     * The block tag name "aside"
     * @return BlockTag
     */
    static function Aside()
    {
        return new self('aside');
    }
    
    /**
     * The block tag name "del"
     * @return BlockTag
     */
    static function Del()
    {
        return new self('del');
    }
    
    /**
     * The block tag name "div"
     * @return BlockTag
     */
    static function Div()
    {
        return new self('div');
    }
    
    /**
     * The block tag name "footer"
     * @return BlockTag
     */
    static function Footer()
    {
        return new self('footer');
    }
    
    /**
     * The block tag name "header"
     * @return BlockTag
     */
    static function Header()
    {
        return new self('header');
    }
    
    /**
     * The block tag name "ins"
     * @return BlockTag
     */
    static function Ins()
    {
        return new self('ins');
    }
    
    /**
     * The block tag name "main"
     * @return BlockTag
     */
    static function Main()
    {
        return new self('main');
    }
    /**
     * The block tag name "nav"
     * @return BlockTag
     */
    static function Nav()
    {
        return new self('nav');
    }
    
    /**
     * The block tag name "section"
     * @return BlockTag
     */
    static function Section()
    {
        return new self('section');
    }
}

