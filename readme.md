## Math

Math classes.

### Installation

```bash
composer require mcmatters/math
```

### Usage

```php
<?php

declare(strict_types = 1);

use McMatters\Math\Prime;

require 'vendor/autoload.php';

$prime = new Prime();

echo $prime->next(37); // displays "41". 
echo $prime->previous(1000000); // displays "999983".
```
