<?php

namespace App\Nova;

use App\Nova\Actions\Post\TogglePostPublication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class Post extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Post::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title', 'slug',
    ];

    public function fields(Request $request): array
    {
        return [
            new Panel('Post', [
                ID::make(__('ID'), 'id')->sortable(),

                Text::make('Title')
                    ->rules(['required', 'string', 'max:255']),

                Slug::make('Slug')
                    ->from('Title'),

                Text::make('Excerpt'),

                Markdown::make('Text')
                    ->rules(['required', 'string'])
                    ->withMeta(['extraAttributes' => [
                        'placeholder' => 'Make it less than 50 characters']
                    ])
                    ->stacked()
                    ->alwaysShow(),

            ]),

            new Panel('Meta', [
                Boolean::make('Published')
                    ->rules(['boolean'])
                    ->default(false),

                Text::make('External url'),

                DateTime::make('Publish at'),
            ]),

            MorphToMany::make('Tags'),
        ];
    }

    public function actions(Request $request): array
    {
        return [
            new TogglePostPublication(),
        ];
    }
}
