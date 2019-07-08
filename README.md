### Laravel nova breadcrumb with button back

Install:
`composer require opanegro/ptdot-button-back`

Tambah code di app/NovaServiceProvider.php:
```
use Opanegro\PtdotButtonBack;

public function tools()
{
    ...
    
    PtdotButtonBack::make(),
}
```

Tambahkan jg di file app/Nova/Resource.php

```
use Opanegro\PtdotButtonBack\Traits;

abstract class Resource extends NovaResource
{
    use Breadcrumbs;
    
    ...
}
```

Inspired by:
- [Nova Breadcrumb](https://github.com/chris-ware/nova-breadcrumbs)
