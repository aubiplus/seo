# Seo

In your view scripts or controller actions, often it is necessary to convert strings to perform well in urls. You can use this helper classes to perform these behaviors for you.

For example: The string `this is just an example` will be converted to `this-is-just-an-example`.

## Installation
```console
./composer.phar require aubiplus\seo
```

## Usage

### Sample module config:
```php
<?php
return [
    'seo'             => [
        'seperator' => '-',
        'chars'     => [
            '/ä|Ä/' => 'ae',
            '/ö|Ö/' => 'oe',
            '/ü|Ü/' => 'ue'
        ]
    ]
];
```

#### Seperator
The defined seperator is used to replace all whitespaces with the given character. 

#### Chars
In the chars section you can define own replacements. As you can see in the sample module config the key is a regular expression which will be replaced by the value.

### Use service
```php
$urlService = $serviceManager->get(\Aubiplus\Seo\Service\Url::class);
echo $urlService->create("this is just an example");
```

### Use view helper
```php
echo $this->seoUrl("this is just an example");
```

### Use controller plugin
```php
echo $this->seoUrl("this is just an example");
```

## Questions / support

If you're having trouble with this module feel free and create an [issue](https://github.com/aubiplus/seo/issues).
