<?php

namespace App\Filament\Resources\MenuResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Tabs;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Az')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                        Tabs\Tab::make('En')
                            ->schema([
                                Forms\Components\TextInput::make('title_en')
                                    ->label('Title')
                                    ->maxLength(255),
                            ]),
                        Tabs\Tab::make('Ru')
                            ->schema([
                                Forms\Components\TextInput::make('title_ru')
                                    ->label('Title')
                                    ->maxLength(255),
                            ]),
                    ])->columnSpanFull(),
                Forms\Components\TextInput::make('slug')
                    ->required(),
                Forms\Components\Select::make('parent_id')
                    ->relationship('parent', 'title'),
            ])->columns(2);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
}
