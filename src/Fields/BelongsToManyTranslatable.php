<?php

namespace KraenkVisuell\NovaTranslatable\Fields;

use KraenkVisuell\NovaTranslatable\Rules\NotExactlyAttachedTranslatable;
use Laravel\Nova\Fields\BelongsToMany;

class BelongsToManyTranslatable extends BelongsToMany
{
    /**
     * Set allow same relation rules.
     *
     * @return $this
     */
    public function allowDuplicateRelations()
    {
        return $this->creationRules(function ($request) {
            return [
                new NotExactlyAttachedTranslatable($request, $request->findModelOrFail()),
            ];
        });
    }
}
