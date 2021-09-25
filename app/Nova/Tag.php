<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphedByMany;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Tag extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Tag::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
    ];

    public function fields(Request $request): array
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            Text::make('name')
                ->rules(['required', 'string', 'max:255', Rule::unique('tags', 'name')->ignore($this->id)]),

            MorphedByMany::make('Posts'),
        ];
    }
}
