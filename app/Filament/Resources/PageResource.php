<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Livewire\Component as Livewire;
use Filament\Forms\Components\Tabs;

class PageResource extends Resource
{

    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Tabs::make('title_tabs')->label('Title')
                                    ->tabs([
                                        Tabs\Tab::make('En')
                                            ->schema([
                                                Forms\Components\TextInput::make('title')
                                                    ->required()
                                                    ->live(onBlur: true)
                                                    ->unique(ignoreRecord: true)
                                                    ->afterStateUpdated(function(string $operation, $state, Forms\Set $set) {
                                                        if ($operation !== 'create') {
                                                            return;
                                                        }

                                                        $set('slug', Str::slug($state));
                                                    }),
                                            ]),
                                        Tabs\Tab::make('Tr')
                                            ->schema([
                                                Forms\Components\TextInput::make('title_tr')->label('Title'),
                                            ]),
                                    ])->columnSpanFull(),
                                Forms\Components\TextInput::make('slug')
                                    ->disabled()
                                    ->dehydrated()
                                    ->required()
                                    ->unique(Page::class, 'slug', ignoreRecord: true),
                                Forms\Components\Select::make('parent_id')
                                    ->relationship('parent', 'title'),
                            ])->columns(2),

                        Forms\Components\Builder::make('content')
                            ->blocks([
                                Forms\Components\Builder\Block::make('hero')
                                    ->label('Hero')
                                    ->schema([
                                        Tabs::make('HeroTabs')
                                            ->tabs([
                                                Tabs\Tab::make('En')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('first_line')
                                                            ->label('First Line'),
                                                        Forms\Components\TextInput::make('second_line')
                                                            ->label('Second Line'),
                                                    ]),
                                                Tabs\Tab::make('Tr')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('first_line_tr')
                                                            ->label('First Line'),
                                                        Forms\Components\TextInput::make('second_line_tr')
                                                            ->label('Second Line'),
                                                    ]),
                                            ]),
                                    ]),
                                Forms\Components\Builder\Block::make('why_us')
                                    ->label('Why us?')
                                    ->schema([
                                        Tabs::make('WhyUsTabs')
                                            ->tabs([
                                                Tabs\Tab::make('En')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('content')
                                                            ->label('Content'),
                                                    ]),
                                                Tabs\Tab::make('Tr')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_tr')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('content_tr')
                                                            ->label('Content'),
                                                    ]),
                                            ]),
                                        Forms\Components\Repeater::make('value')
                                            ->label('Value')
                                            ->schema([
                                                Tabs::make('ValueTabs')
                                                    ->tabs([
                                                        Tabs\Tab::make('En')
                                                            ->schema([
                                                                Forms\Components\Textarea::make('icon')
                                                                    ->label('Icon'),
                                                                Forms\Components\TextInput::make('title')
                                                                    ->label('Title'),
                                                                Forms\Components\RichEditor::make('content')
                                                                    ->label('Content'),
                                                            ]),
                                                        Tabs\Tab::make('Tr')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title_tr')
                                                                    ->label('Title'),
                                                                Forms\Components\RichEditor::make('content_tr')
                                                                    ->label('Content'),
                                                            ]),
                                                    ]),
                                            ]),
                                    ]),
                                Forms\Components\Builder\Block::make('services')
                                    ->label('Services')
                                    ->schema([
                                        Tabs::make('ServicesTabs')
                                            ->tabs([
                                                Tabs\Tab::make('En')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title')
                                                            ->label('Title'),
                                                    ]),
                                                Tabs\Tab::make('Tr')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_tr')
                                                            ->label('Title'),
                                                    ]),
                                            ]),
                                        Forms\Components\Repeater::make('service')
                                            ->label('Service')
                                            ->schema([
                                                Tabs::make('ServiceTabs')
                                                    ->tabs([
                                                        Tabs\Tab::make('En')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title')
                                                                    ->label('Title'),
                                                                Forms\Components\RichEditor::make('content')
                                                                    ->label('Content'),
                                                            ]),
                                                        Tabs\Tab::make('Tr')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title_tr')
                                                                    ->label('Title'),
                                                                Forms\Components\RichEditor::make('content_tr')
                                                                    ->label('Content'),
                                                            ]),
                                                    ]),
                                            ]),
                                    ]),
                                Forms\Components\Builder\Block::make('contacts')
                                    ->label('Contacts')
                                    ->schema([
                                        Tabs::make('ContactsTabs')
                                            ->tabs([
                                                Tabs\Tab::make('En')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('address_title')->label('Address title'),
                                                        Forms\Components\TextInput::make('address')->label('Address'),
                                                        Forms\Components\TextInput::make('phone_title')->label('Phone Title'),
                                                        Forms\Components\TextInput::make('email_title')->label('Email Title'),
                                                    ]),
                                                Tabs\Tab::make('Tr')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('address_title_tr')->label('Address title'),
                                                        Forms\Components\TextInput::make('address_tr')->label('Address'),
                                                        Forms\Components\TextInput::make('phone_title_tr')->label('Phone Title'),
                                                        Forms\Components\TextInput::make('email_title_tr')->label('Email Title'),
                                                    ]),
                                            ]),
                                        Forms\Components\Repeater::make('phone')
                                            ->label('Phone')
                                            ->schema([
                                                Tabs::make('PhoneTabs')
                                                    ->tabs([
                                                        Tabs\Tab::make('En')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title'),
                                                            ]),
                                                        Tabs\Tab::make('Tr')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title_tr'),
                                                            ]),
                                                    ]),
                                                Forms\Components\TextInput::make('value'),
                                            ]),
                                        Forms\Components\Repeater::make('email')
                                            ->label('Email')
                                            ->schema([
                                                Tabs::make('EmailTabs')
                                                    ->tabs([
                                                        Tabs\Tab::make('En')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title'),
                                                            ]),
                                                        Tabs\Tab::make('Tr')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title_tr'),
                                                            ]),
                                                    ]),
                                                Forms\Components\TextInput::make('value'),
                                            ])
                                    ]),
                            ])->blockNumbers(false)->collapsible()
                    ])->columnSpan(2),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Status')
                            ->schema([
                                Forms\Components\Toggle::make('is_visible')
                                    ->label("Visibility")
                                    ->helperText('Enable or disable product visibility')
                                    ->default(true),
                                Forms\Components\Select::make('template_id')
                                    ->relationship('template','title'),
                                Forms\Components\DatePicker::make('published_at')
                                    ->label('Availability')
                                    ->default(now())
                            ]),
                        Forms\Components\Section::make('Seo')
                            ->schema([
                                Tabs::make('SeoTabs')
                                    ->tabs([
                                        Tabs\Tab::make('En')
                                            ->schema([
                                                Forms\Components\TextInput::make('seo_title')->label('Seo Title'),
                                                Forms\Components\Textarea::make('seo_description')->label('Seo Description'),
                                            ]),
                                        Tabs\Tab::make('Tr')
                                            ->schema([
                                                Forms\Components\TextInput::make('seo_title_tr')->label('Seo Title'),
                                                Forms\Components\Textarea::make('seo_description_tr')->label('Seo Description'),
                                            ]),
                                    ]),
                            ]),
                        Forms\Components\Section::make('Image')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->directory('images')
                                    ->preserveFilenames()
                                    ->image()
                                    ->imageEditor()
                            ])->collapsible(),
                    ])->columnSpan(1)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('parent.title')
                    ->label('Parent')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_visible')
                    ->sortable()
                    ->toggleable()
                    ->label('Visibility')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
