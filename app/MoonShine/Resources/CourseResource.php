<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Date;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use App\Models\Teacher;
use App\Models\Course_family;

/**
 * @extends ModelResource<Course>
 */
class CourseResource extends ModelResource
{
    protected string $model = Course::class;

    protected string $title = 'Courses';
    
    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Название', 'name')->sortable(),
            Text::make('Описание', 'description'),
            Select::make('Преподаватель', 'teacher_id')->options(Teacher::all()->mapWithKeys(fn($teacher) => [$teacher->id => (string) "{$teacher->first_name} {$teacher->last_name}"])->toArray()),
            Text::make('Цена', 'price'),
            Date::make('Дата начала', 'start_date'),
            Date::make('Дата окончания', 'end_date'),
            Select::make('Тема курсов', 'course_family_id')->options(Course_family::all()->mapWithKeys(fn($course_family)=>[$course_family->id => (string) $course_family->family_name])->toArray())
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make()->sortable(),
                Text::make('Название', 'name')->sortable(),
                Text::make('Описание', 'description'),
                Select::make('Преподаватель', 'teacher_id')->options(Teacher::all()->mapWithKeys(fn($teacher) => [$teacher->id => (string) "{$teacher->first_name} {$teacher->last_name}"])->toArray()),
                Text::make('Цена', 'price'),
                Date::make('Дата начала', 'start_date'),
                Date::make('Дата окончания', 'end_date'),
                Select::make('Тема курсов', 'course_family_id')->options(Course_family::all()->mapWithKeys(fn($course_family)=>[$course_family->id => (string) $course_family->family_name])->toArray())
                ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
        ];
    }

    /**
     * @param Course $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
