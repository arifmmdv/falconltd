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
                                        Tabs\Tab::make('Az')
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
                                        Tabs\Tab::make('En')
                                            ->schema([
                                                Forms\Components\TextInput::make('title_en')->label('Title'),
                                            ]),
                                        Tabs\Tab::make('Ru')
                                            ->schema([
                                                Forms\Components\TextInput::make('title_ru')->label('Title'),
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
                                Forms\Components\Builder\Block::make('slider')
                                    ->label('Slider')
                                    ->schema([
                                        Forms\Components\Repeater::make('slide')
                                            ->label('Slide')
                                            ->schema([
                                                Tabs::make('SlideTabs')
                                                    ->tabs([
                                                        Tabs\Tab::make('Az')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title'),
                                                                Forms\Components\TextInput::make('sub_title')->label('Sub title'),
                                                                Forms\Components\TextInput::make('button_text')->label('Button Text'),
                                                                Forms\Components\TextInput::make('button_text_2')->label('Button 2 Text'),
                                                            ]),
                                                        Tabs\Tab::make('En')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title_en'),
                                                                Forms\Components\TextInput::make('sub_title_en')->label('Sub title'),
                                                                Forms\Components\TextInput::make('button_text_en')->label('Button Text'),
                                                                Forms\Components\TextInput::make('button_text_2_en')->label('Button 2 Text'),
                                                            ]),
                                                        Tabs\Tab::make('Ru')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title_ru'),
                                                                Forms\Components\TextInput::make('sub_title_ru')->label('Sub title'),
                                                                Forms\Components\TextInput::make('button_text_ru')->label('Button Text'),
                                                                Forms\Components\TextInput::make('button_text_2_ru')->label('Button 2 Text'),
                                                            ]),
                                                    ]),
                                                Forms\Components\TextInput::make('button_link')->label('Button Link'),
                                                Forms\Components\TextInput::make('button_link_2')->label('Button 2 Link'),
                                                Forms\Components\FileUpload::make('image')
                                                    ->directory('slides')
                                                    ->image()
                                                    ->imageEditor(),
                                            ]),
                                    ]),
                                Forms\Components\Builder\Block::make('about')
                                    ->label('About')
                                    ->schema([
                                        Tabs::make('AboutTabs')
                                            ->tabs([
                                                Tabs\Tab::make('Az')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('content')
                                                            ->label('Content'),
                                                        Forms\Components\RichEditor::make('bold_content')
                                                            ->label('Bold content'),
                                                    ]),
                                                Tabs\Tab::make('En')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_en')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('content_en')
                                                            ->label('Content'),
                                                        Forms\Components\RichEditor::make('bold_content_en')
                                                            ->label('Bold content'),
                                                    ]),
                                                Tabs\Tab::make('Ru')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_ru')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('content_ru')
                                                            ->label('Content'),
                                                        Forms\Components\RichEditor::make('bold_content_ru')
                                                            ->label('Bold content'),
                                                    ]),
                                            ]),
                                        Forms\Components\FileUpload::make('image_1')->label('Image 1')
                                            ->directory('content-images')
                                            ->preserveFilenames()
                                            ->image()
                                            ->imageEditor(),
                                        Forms\Components\FileUpload::make('image_2')->label('Image 2')
                                            ->directory('content-images')
                                            ->preserveFilenames()
                                            ->image()
                                            ->imageEditor()
                                    ]),
                                Forms\Components\Builder\Block::make('about_2')
                                    ->label('About 2')
                                    ->schema([
                                        Tabs::make('About2Tabs')
                                            ->tabs([
                                                Tabs\Tab::make('Az')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('bold_content')
                                                            ->label('Bold content'),
                                                        Forms\Components\RichEditor::make('content')
                                                            ->label('Content'),
                                                        Forms\Components\TextInput::make('button_text')->label('Button Text'),
                                                    ]),
                                                Tabs\Tab::make('En')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_en')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('bold_content_en')
                                                            ->label('Bold content'),
                                                        Forms\Components\RichEditor::make('content_en')
                                                            ->label('Content'),
                                                        Forms\Components\TextInput::make('button_text_en')
                                                            ->label('Button Text'),
                                                    ]),
                                                Tabs\Tab::make('Ru')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_ru')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('bold_content_ru')
                                                            ->label('Bold content'),
                                                        Forms\Components\RichEditor::make('content_ru')
                                                            ->label('Content'),
                                                        Forms\Components\TextInput::make('button_text_ru')
                                                            ->label('Button Text'),
                                                    ]),
                                            ]),
                                        Forms\Components\TextInput::make('button_link')->label('Button Link'),
                                        Forms\Components\FileUpload::make('image')->label('Image')
                                            ->directory('content-images')
                                            ->preserveFilenames()
                                            ->image()
                                            ->imageEditor(),
                                    ]),
                                Forms\Components\Builder\Block::make('company_vision')
                                    ->label('Company Vision')
                                    ->schema([
                                        Tabs::make('CompanyVisionTabs')
                                            ->tabs([
                                                Tabs\Tab::make('Az')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('bold_content')
                                                            ->label('Bold content'),
                                                        Forms\Components\RichEditor::make('content')
                                                            ->label('Content'),
                                                    ]),
                                                Tabs\Tab::make('En')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_en')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('bold_content_en')
                                                            ->label('Bold content'),
                                                        Forms\Components\RichEditor::make('content_en')
                                                            ->label('Content'),
                                                    ]),
                                                Tabs\Tab::make('Ru')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_ru')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('bold_content_ru')
                                                            ->label('Bold content'),
                                                        Forms\Components\RichEditor::make('content_ru')
                                                            ->label('Content'),
                                                    ]),
                                            ]),
                                        Forms\Components\FileUpload::make('image')->label('Image')
                                            ->directory('content-images')
                                            ->preserveFilenames()
                                            ->image()
                                            ->imageEditor(),
                                    ]),
                                Forms\Components\Builder\Block::make('company_vision_2')
                                    ->label('Company Vision 2')
                                    ->schema([
                                        Tabs::make('CompanyVision2Tabs')
                                            ->tabs([
                                                Tabs\Tab::make('Az')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('bold_content')
                                                            ->label('Bold content'),
                                                        Forms\Components\RichEditor::make('content')
                                                            ->label('Content'),
                                                    ]),
                                                Tabs\Tab::make('En')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_en')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('bold_content_en')
                                                            ->label('Bold content'),
                                                        Forms\Components\RichEditor::make('content_en')
                                                            ->label('Content'),
                                                    ]),
                                                Tabs\Tab::make('Ru')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_ru')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('bold_content_ru')
                                                            ->label('Bold content'),
                                                        Forms\Components\RichEditor::make('content_ru')
                                                            ->label('Content'),
                                                    ]),
                                            ]),
                                        Forms\Components\FileUpload::make('image')->label('Image')
                                            ->directory('content-images')
                                            ->preserveFilenames()
                                            ->image()
                                            ->imageEditor(),
                                    ]),
                                Forms\Components\Builder\Block::make('our_values')
                                    ->label('Our Values')
                                    ->schema([
                                        Tabs::make('OurValuesTabs')
                                            ->tabs([
                                                Tabs\Tab::make('Az')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('content')
                                                            ->label('Content'),
                                                    ]),
                                                Tabs\Tab::make('En')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_en')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('content_en')
                                                            ->label('Content'),
                                                    ]),
                                                Tabs\Tab::make('Ru')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_ru')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('content_ru')
                                                            ->label('Content'),
                                                    ]),
                                            ]),
                                        Forms\Components\Repeater::make('value')
                                            ->label('Value')
                                            ->schema([
                                                Tabs::make('ValueTabs')
                                                    ->tabs([
                                                        Tabs\Tab::make('Az')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title')
                                                                    ->label('Title'),
                                                                Forms\Components\RichEditor::make('content')
                                                                    ->label('Content'),
                                                            ]),
                                                        Tabs\Tab::make('En')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title_en')
                                                                    ->label('Title'),
                                                                Forms\Components\RichEditor::make('content_en')
                                                                    ->label('Content'),
                                                            ]),
                                                        Tabs\Tab::make('Ru')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title_en')
                                                                    ->label('Title'),
                                                                Forms\Components\RichEditor::make('content_en')
                                                                    ->label('Content'),
                                                            ]),
                                                    ]),
                                            ]),
                                    ]),
                                Forms\Components\Builder\Block::make('our_approach')
                                    ->label('Our approach')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Title'),
                                        Forms\Components\Textarea::make('bold_content')
                                            ->label('Bold content'),
                                        Forms\Components\RichEditor::make('content')
                                            ->label('Content'),
                                    ]),
                                Forms\Components\Builder\Block::make('our_approach_2')
                                    ->label('Our approach 2')
                                    ->schema([
                                        Tabs::make('OurApproach2Tabs')
                                            ->tabs([
                                                Tabs\Tab::make('Az')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('content')
                                                            ->label('Content'),
                                                    ]),
                                                Tabs\Tab::make('En')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_en')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('content_en')
                                                            ->label('Content'),
                                                    ]),
                                                Tabs\Tab::make('Ru')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_ru')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('content_ru')
                                                            ->label('Content'),
                                                    ]),
                                            ]),
                                        Forms\Components\FileUpload::make('image')->label('Image')
                                            ->directory('content-images')
                                            ->preserveFilenames()
                                            ->image()
                                            ->imageEditor(),
                                        Forms\Components\Toggle::make('dark')
                                            ->label('Dark'),
                                    ]),
                                Forms\Components\Builder\Block::make('ceo_section')
                                    ->label('Ceo section')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Title'),
                                        Forms\Components\RichEditor::make('bold_content')
                                            ->label('Bold content'),
                                        Forms\Components\RichEditor::make('content')
                                            ->label('Content'),
                                        Forms\Components\FileUpload::make('image')->label('Image')
                                            ->directory('content-images')
                                            ->preserveFilenames()
                                            ->image()
                                            ->imageEditor(),
                                    ]),
                                Forms\Components\Builder\Block::make('our_history')
                                    ->label('Our History')
                                    ->schema([
                                        Tabs::make('HistoryTabs')
                                            ->tabs([
                                                Tabs\Tab::make('Az')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('bold_content')
                                                            ->label('Bold content'),
                                                        Forms\Components\RichEditor::make('content')
                                                            ->label('Content'),
                                                    ]),
                                                Tabs\Tab::make('En')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_en')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('bold_content_en')
                                                            ->label('Bold content'),
                                                        Forms\Components\RichEditor::make('content_en')
                                                            ->label('Content'),
                                                    ]),
                                                Tabs\Tab::make('Ru')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_ru')
                                                            ->label('Title'),
                                                        Forms\Components\RichEditor::make('bold_content_ru')
                                                            ->label('Bold content'),
                                                        Forms\Components\RichEditor::make('content_ru')
                                                            ->label('Content'),
                                                    ]),
                                            ]),
                                        Forms\Components\FileUpload::make('image_1')->label('Image 1')
                                            ->directory('content-images')
                                            ->preserveFilenames()
                                            ->image()
                                            ->imageEditor(),
                                        Forms\Components\FileUpload::make('image_2')->label('Image 2')
                                            ->directory('content-images')
                                            ->preserveFilenames()
                                            ->image()
                                            ->imageEditor()
                                    ]),
                                Forms\Components\Builder\Block::make('partners')
                                    ->label('Partners')
                                    ->schema([
                                        Forms\Components\Repeater::make('partner')
                                            ->label('Partner')
                                            ->schema([
                                                Forms\Components\TextInput::make('title'),
                                                Forms\Components\TextInput::make('link'),
                                                Forms\Components\FileUpload::make('logo')
                                                    ->directory('content-images')
                                                    ->preserveFilenames()
                                                    ->image()
                                                    ->imageEditor(),
                                            ]),
                                    ]),
                                Forms\Components\Builder\Block::make('page_title')
                                    ->label('Page Title')
                                    ->schema([
                                        Tabs::make('PageTitleTabs')
                                            ->tabs([
                                                Tabs\Tab::make('Az')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title')
                                                            ->label('Title')
                                                            ->required(),
                                                    ]),
                                                Tabs\Tab::make('En')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_en')
                                                            ->label('Title'),
                                                    ]),
                                                Tabs\Tab::make('Ru')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_ru')
                                                            ->label('Title'),
                                                    ]),
                                            ])
                                    ]),
                                Forms\Components\Builder\Block::make('blogs')
                                    ->label('Blog')
                                    ->schema([
                                        Forms\Components\TextInput::make('limit')
                                            ->label('Limit')
                                            ->required(),
                                        Forms\Components\Toggle::make('pagination')
                                            ->label('Pagination')
                                            ->required(),
                                    ]),
                                Forms\Components\Builder\Block::make('latest_blogs')
                                    ->label('Latest Blogs')
                                    ->schema([
                                        Tabs::make('Tabs')
                                            ->tabs([
                                                Tabs\Tab::make('Az')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title')
                                                            ->label('Title'),
                                                        Forms\Components\TextInput::make('sub_title')
                                                            ->label('Sub title'),
                                                    ]),
                                                Tabs\Tab::make('En')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_en')
                                                            ->label('Title'),
                                                        Forms\Components\TextInput::make('sub_title_en')
                                                            ->label('Sub title'),
                                                    ]),
                                                Tabs\Tab::make('Ru')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_ru')
                                                            ->label('Title'),
                                                        Forms\Components\TextInput::make('sub_title_ru')
                                                            ->label('Sub title'),
                                                    ]),
                                            ]),
                                    ]),
                                Forms\Components\Builder\Block::make('services')
                                    ->label('Services')
                                    ->schema([
                                        Tabs::make('ServicesTabs')
                                            ->tabs([
                                                Tabs\Tab::make('Az')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title')
                                                            ->label('Title'),
                                                        Forms\Components\TextInput::make('sub_title')
                                                            ->label('Sub title'),
                                                    ]),
                                                Tabs\Tab::make('En')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_en')
                                                            ->label('Title'),
                                                        Forms\Components\TextInput::make('sub_title_en')
                                                            ->label('Sub title'),
                                                    ]),
                                                Tabs\Tab::make('Ru')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('title_ru')
                                                            ->label('Title'),
                                                        Forms\Components\TextInput::make('sub_title_ru')
                                                            ->label('Sub title'),
                                                    ]),
                                            ]),
                                    ]),
                                Forms\Components\Builder\Block::make('map')
                                    ->label('Map')
                                    ->schema([
                                        Forms\Components\TextInput::make('height')
                                            ->label('Height')
                                            ->required(),
                                    ]),
                                Forms\Components\Builder\Block::make('contact_form')
                                    ->label('Contact Form')
                                    ->schema([
                                        Forms\Components\TextInput::make('title'),
                                        Forms\Components\TextInput::make('sub_title')->label('Sub title'),
                                    ]),
                                Forms\Components\Builder\Block::make('slider')
                                    ->label('Slider')
                                    ->schema([
                                        Forms\Components\Repeater::make('slide')
                                            ->label('Slide')
                                            ->schema([
                                                Forms\Components\TextInput::make('title'),
                                                Forms\Components\TextInput::make('sub_title')->label('Sub title'),
                                                Forms\Components\FileUpload::make('image')
                                                    ->directory('slides')
                                                    ->image()
                                                    ->imageEditor(),
                                                Forms\Components\TextInput::make('button_text')->label('Button Text'),
                                                Forms\Components\TextInput::make('button_link')->label('Button Link'),
                                            ]),
                                    ]),
                                Forms\Components\Builder\Block::make('content')
                                    ->label('Content')
                                    ->schema([
                                        Forms\Components\RichEditor::make('content')
                                            ->label('Content')
                                            ->required(),
                                    ]),
                                Forms\Components\Builder\Block::make('content_with_image')
                                    ->label('Content with Image')
                                    ->schema([
                                        Forms\Components\RichEditor::make('content')
                                            ->label('Content')
                                            ->required(),
                                        Forms\Components\FileUpload::make('image')
                                            ->directory('content-images')
                                            ->preserveFilenames()
                                            ->image()
                                            ->imageEditor()
                                    ]),
                                Forms\Components\Builder\Block::make('contacts')
                                    ->label('Contacts')
                                    ->schema([
                                        Tabs::make('ContactsTabs')
                                            ->tabs([
                                                Tabs\Tab::make('Az')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('address_title')->label('Address title'),
                                                        Forms\Components\TextInput::make('address')->label('Address'),
                                                        Forms\Components\TextInput::make('phone_title')->label('Phone Title'),
                                                        Forms\Components\TextInput::make('email_title')->label('Email Title'),
                                                    ]),
                                                Tabs\Tab::make('En')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('address_title_en')->label('Address title'),
                                                        Forms\Components\TextInput::make('address_en')->label('Address'),
                                                        Forms\Components\TextInput::make('phone_title_en')->label('Phone Title'),
                                                        Forms\Components\TextInput::make('email_title_en')->label('Email Title'),
                                                    ]),
                                                Tabs\Tab::make('Ru')
                                                    ->schema([
                                                        Forms\Components\TextInput::make('address_title_ru')->label('Address title'),
                                                        Forms\Components\TextInput::make('address_ru')->label('Address'),
                                                        Forms\Components\TextInput::make('phone_title_ru')->label('Phone Title'),
                                                        Forms\Components\TextInput::make('email_title_ru')->label('Email Title'),
                                                    ]),
                                            ]),
                                        Forms\Components\Repeater::make('phone')
                                            ->label('Phone')
                                            ->schema([
                                                Tabs::make('PhoneTabs')
                                                    ->tabs([
                                                        Tabs\Tab::make('Az')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title'),
                                                            ]),
                                                        Tabs\Tab::make('En')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title_en'),
                                                            ]),
                                                        Tabs\Tab::make('Ru')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title_ru'),
                                                            ]),
                                                    ]),
                                                Forms\Components\TextInput::make('value'),
                                            ]),
                                        Forms\Components\Repeater::make('email')
                                            ->label('Email')
                                            ->schema([
                                                Tabs::make('EmailTabs')
                                                    ->tabs([
                                                        Tabs\Tab::make('Az')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title'),
                                                            ]),
                                                        Tabs\Tab::make('En')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title_en'),
                                                            ]),
                                                        Tabs\Tab::make('Ru')
                                                            ->schema([
                                                                Forms\Components\TextInput::make('title_ru'),
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
                                        Tabs\Tab::make('Az')
                                            ->schema([
                                                Forms\Components\TextInput::make('seo_title')->label('Seo Title'),
                                                Forms\Components\Textarea::make('seo_description')->label('Seo Description'),
                                            ]),
                                        Tabs\Tab::make('En')
                                            ->schema([
                                                Forms\Components\TextInput::make('seo_title_en')->label('Seo Title'),
                                                Forms\Components\Textarea::make('seo_description_en')->label('Seo Description'),
                                            ]),
                                        Tabs\Tab::make('Ru')
                                            ->schema([
                                                Forms\Components\TextInput::make('seo_title_ru')->label('Seo Title'),
                                                Forms\Components\Textarea::make('seo_description_ru')->label('Seo Description'),
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
