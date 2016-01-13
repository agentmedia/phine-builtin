<?php

namespace Phine\Bundles\BuiltIn\Logic\HtmlTemplating;
use Phine\Framework\System\IO\File;
use Phine\Framework\System\String;

/**
 * A common parser for html templates with placeholders
 */
class TemplateParser
{
    /**
     * Associative array with placeholders and replacements
     * @var string[]
     */
    private $replacements;
    /**
     * placeholder start token
     * @var string
     */
    private $phStart;
    /**
     * placeholder end token
     * @var string
     */
    private $phEnd;
    
    /**
     * Creates a template parser
     * 
     * @param array $replacements The placeholder replacements
     * @param string $phStart The placeholder start tag
     * @param string $phEnd The placeholder end tag
     */
    function __construct(array $replacements = array(), $phStart = '{{', $phEnd = '}}')
    {
        $this->replacements = $replacements;
        $this->phStart = $phStart;
        $this->phEnd = $phEnd;
    }
    
    /**
     * Sets the placeholder replacemets
     * @param array $replacements The replacements as assiciative array
     */
    function setReplacements(array $replacements)
    {
        $this->replacements = $replacements;
    }
    
    
    function addReplacement($placeholder, $text)
    {
        $this->replacements[$placeholder] = $text;
    }
    
    function Parse($file)
    {
        $contents = File::GetContents($file);
        foreach ($this->replacements as $placeholder=>$text)
        {
            $contents = String::Replace($this->phStart . $placeholder . $this->phEnd, 
                    $text, $contents);
        }
        return $contents;
    }
}
