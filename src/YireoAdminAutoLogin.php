<?php declare(strict_types=1);

namespace Yireo\AdminAutoLogin;

use Shopware\Core\Framework\Plugin;
use Yireo\AdminAutoLogin\DependencyInjection\AdminAutoLoginExtension;

class YireoAdminAutoLogin extends Plugin
{
    public function getContainerExtension()
    {
        return new AdminAutoLoginExtension();
    }
}
