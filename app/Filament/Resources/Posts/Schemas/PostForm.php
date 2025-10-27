<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\PostType;

use App\PostStatus;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Utilities\Set;
//para importar te situas en el modulo y le das ctrl + alt +i

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 Grid::make(2)
                    ->columnSpanFull()
                    ->schema([ 
                        Grid::make(1)
                        ->schema([

                             Select::make('type')
                                ->label(__('resource.post.fields.type'))
                                ->required()
                                ->default('post')
                                ->options(PostType::class)
                                ->default(PostType::POST),

                             TextInput::make('title')
                                ->label(__('resource.post.fields.title'))
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(function (Set $set, ?string $state) {
                                       $slug = Str::slug($state);
                                       $set('slug', $slug);
                                       })
                                ->placeholder('Enter post title'),

                             TextInput::make('slug')
                                 ->label(__('resource.post.fields.slug'))
                                 ->required()
                                 ->unique()
                                 ->helperText('URL-friendly version of the title'),


                             Textarea::make('exercpt')
                                 ->label(__('resource.post.fields.exercpt'))
                                 ->columnSpanFull()
                                 ->placeholder('Brief summary or excerpt')
                                 ->helperText('This will be displayed in post previews'),

                            RichEditor::make('content')
                                 ->label(__('resource.post.fields.content'))
                                 ->required()
                                 ->columnSpanFull()
                                 ->placeholder('Write your content here...'),

                        ]) ,
                        
                        Grid::make(1)
                          ->columnSpan(1)
                          ->schema([
                              
                             Section::make('Publish')
                                    ->schema([

                           Select::make('status')
                                ->label(__('resource.post.fields.status'))
                                ->required()
                                ->options(PostStatus::class)
                                ->default(PostStatus::DRAFT->value)
                                ->native(false),

                            DateTimePicker::make('published_at')
                                            ->label(__('resource.post.fields.published_at'))
                                            ->default(now())
                                            ->required()
                                            ->native(false),    

                             Toggle::make('is_featured')
                                            ->label(__('resource.post.fields.is_featured'))
                                            ->default(false)
                                            ->inline(false),

                             Toggle::make('comment_status')
                                            ->label(__('resource.post.fields.comment_status'))
                                            ->default(true)
                                            ->inline(false),    
                                 ])  
                                 ->compact(), 
                                 
                                 

                             Section::make('Featured Image')
                                    ->schema([
                                        FileUpload::make('feature_image')
                                            ->label(__('resource.post.fields.feature_image'))
                                            ->image()
                                            ->imageEditor()
                                            ->imageEditorAspectRatios([
                                                '16:9',
                                                '4:3',
                                                '1:1',
                                            ])
                                            ->directory('posts/featured-images')
                                            ->maxSize(2048)
                                            ->helperText('Max 2MB. Recommended: 1200x630px'),
                                    ])
                                    ->collapsible()
                                    ->compact(),

                          

                        Section::make('Organization')
                                    ->schema([  
 

                          Select::make('parent_id')
                                            ->relationship('parent', 'title')
                                            ->searchable()
                                            ->label(__('resource.post.fields.parent_id'))
                                            ->placeholder('Select parent post')
                                            ->native(false),
                                    ])
                                     ->collapsible()
                                    ->collapsed()
                                    ->compact(),

                        
                          ])


                    ]),
               

               

                
            ]);
    }
}
