# Laravel nova breadcrumb with button back

Required:
- Laravel v5.7+
- Laravel Nova v2

Install:
`composer require opanegro/ptdot-button-back`

Tambah code di app/NovaServiceProvider.php:
```
use Opanegro\PtdotButtonBack\PtdotButtonBack;

public function tools()
{
    return [
        ...
        PtdotButtonBack::make(),
    ];
}
```

Tambahkan jg di file app/Nova/Resource.php

```
use Opanegro\PtdotButtonBack\Traits\Breadcrumbs;

abstract class Resource extends NovaResource
{
    use Breadcrumbs;
    
    ...
}
```

Inspired by:
- [Nova Breadcrumb](https://github.com/chris-ware/nova-breadcrumbs)
