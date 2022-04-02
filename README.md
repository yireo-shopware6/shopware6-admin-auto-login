# Shopware 6 Admin Auto Login

**A plugin that automatically logs you in to the Shopware Administation. Don't use in production ;o**

### Installation
Install and activate this plugin:
```bash
composer require yireo/shopware6-admin-auto-login
```
And then:
```bash
bin/console plugin:refresh
bin/console plugin:install --activate YireoAdminAutoLogin
```

### Configuration
Create a new file `config/packages/admin_auto_login.yml` with the following contents:
```yaml
parameters:
    admin_auto_login.username: 'admin'
    admin_auto_login.password: 'shopware'
```

Obviously, change the credentials to make your own environment.
