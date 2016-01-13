<?php

namespace Phine\Bundles\BuiltIn;
use Phine\Bundles\Core;
use Phine\Bundles\Core\Logic\Bundle\BundleManifest;
use Phine\Bundles\Core\Logic\Bundle\BundleManufacturer;
use Phine\Bundles\Core\Logic\Bundle\BundleDependency;
use Phine\Framework\System\IO\Path;

class Manifest extends BundleManifest
{
    /**
     *
     * @var Core\Manifest;
     */
    private $core;
    
    /**
     * Creates the BuiltIn bundle manifest
     */
    function __construct()
    {
        $this->core = new Core\Manifest();
    }
    
    /**
     * Bundle version
     * @return string Returns the bundle version
     */
    public function Version()
    {
        return '1.0.2';
    }
    /**
     * Loads extra code not available by autoload
     */
    protected function LoadBackendCode()
    {
        require_once Path::Combine(__DIR__, 'Globals/AddHooks.php');
    }
    /**
     * 
     * @return BundleManufacturer
     */
    public function Manufacturer()
    {
        return $this->core->Manufacturer();
    }
    
    /**
     * The dependencies of the bundle
     * @return BundleDependency[]
     */
    public function Dependencies()
    {
        return array(new BundleDependency('Core', '1.0.3', '1.2.2'));
    }
    
    /**
     * Loads code not coverable by phine autoload
     */
    protected function LoadFrontendCode()
    {
        require_once Path::Combine(__DIR__, 'ThirdParty/PHPMailer/PHPMailerAutoload.php');
    }

}

