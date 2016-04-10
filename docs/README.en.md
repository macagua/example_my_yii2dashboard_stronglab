[![Latest Stable Version](https://poser.pugx.org/stronglab/yii2-dashboard/v/stable)](https://packagist.org/packages/stronglab/yii2-dashboard) [![Total Downloads](https://poser.pugx.org/stronglab/yii2-dashboard/downloads)](https://packagist.org/packages/stronglab/yii2-dashboard) [![Latest Unstable Version](https://poser.pugx.org/stronglab/yii2-dashboard/v/unstable)](https://packagist.org/packages/stronglab/yii2-dashboard) [![License](https://poser.pugx.org/stronglab/yii2-dashboard/license)](https://packagist.org/packages/stronglab/yii2-dashboard)

# Yii2 Dashboard
Create a simple control panel for Yii2

## Installation

```
$ composer require --prefer-dist stronglab/yii2-dashboard "*"
```
Or adding into composer.json file
```
{
    "require": {
        "stronglab/yii2-dashboard": "*"
    }
}
```
### config file of the project config/web.php
```php
'modules' => [
    'dashboard' => [
                'class' => 'stronglab\dashboard\Module',
                'roles' => ['@'], // optional parameter, the default access for all guests
                'column' => 2, // optional parameter, the number of columns in the panel (possible values: 1-3)
                'modules' => [
                    // a list of modules that will search for the dashboard.json file
                    'moduleID',
                    'moduleID',
                    ...
                    'moduleID' => [
                        'jsonPath' => 'config/dashboard/myconf.json', // a separate path to the settings panel, registers the application directory
                    ],
                ],
            ],
],
```
Next update the composer and you are ready to configure the modules

## Setting
In the root directory of each module, you must create dashboard.json file, which must have the following format:

```json
{
    "name": "Dasboard simple config",
    "title": "My module",
    "routes": [
        {
            "route": "default/index",
            "title": "List"
        },
        {
            "route": "default/captcha",
            "title": false
        },
        {
            "route": "default/admin",
            "title": "Admin",
            "icon": "pencil"
        }
    ]
}
```

Format Description:
* _**name**_ - required parameter, module description
* _**title**_ - name optional parameter, used in the absence of the name parameter
* _**routes**_ - required parameter, contains a list of routes that are intercepted by the module and are displayed in the panel

Description block routes:
* _**route**_ - mandatory parameter, you must enter routes without ID module
* _**title**_ - mandatory parameter, is required to display the anchor links in the panel (if set _**false**_, the route does not appear in the panel)
* _**icon**_ - an option, an icon in the panel. Used icons [Glyphicons](http://getbootstrap.com/components/#glyphicons). Parameter _**icon**_ is necessary to enter only the name of the icon (for example, instead of "*glyphicon-pencil*" use "*pencil*")

### Example dashboard.json file for standard CRUD
```json
{
    "name": "Example",
    "title": "Example Header",
    "routes": [
        {
            "route": "default/index",
            "title": "List"
        },
        {
            "route": "default/create",
            "title": "Add"
        },
        {
            "route": "default/view",
            "title": false
        },
        {
            "route": "default/update",
            "title": false
        },
        {
            "route": "default/delete",
            "title": false
        }
    ]
}
```

Luego acceda a la direccion URL http://127.0.0.1:8000/dashboard

### Features
You can use the panel to display the routes outside the module. To do this, you need to create dashboard.json file in the root directory of the application.

[Created by strong aka Aleksand Demchenko](http://22info.ru)
