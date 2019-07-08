<?php

namespace Opanegro\PtdotButtonBack\Traits;

use Illuminate\Support\Collection;

trait Breadcrumbs
{
    /**
     * send json response to vue
     *
     * @param Collection $fields
     * @return array
     */
    protected function serializeWithId(Collection $fields)
    {
        $parent = parent::serializeWithId($fields);

        return array_merge($parent, [
            'label' => $this->breadcrumbResourceLabel(),
            'title' => $this->breadcrumbResourceTitle()
        ]);
    }

    /**
     * get label resource
     *
     * @return mixed
     */
    protected function breadcrumbResourceLabel()
    {
        return $this->label();
    }

    /**
     * get label title resource
     *
     * @return mixed
     */
    protected function breadcrumbResourceTitle()
    {
        return $this->title();
    }
}