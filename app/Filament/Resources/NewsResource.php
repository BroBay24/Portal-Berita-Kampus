<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use Illuminate\Support\Str;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('author_id')
                    ->relationship(name: 'author', titleAttribute: 'name')
                    ->required(),
                select::make('news_category_id')
                    ->relationship(name: 'newsCategory', titleAttribute: 'title')
                    ->required(),
                TextInput::make('title')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->required(),
                TextInput::make('slug')
                    ->readOnly(),
                FileUpload::make('thumbnail')
                    ->label('Thumbnail Berita')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        null,
                    ])
                    ->imageResizeMode('contain')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('1920')
                    ->imageResizeTargetHeight('1080')
                    ->directory('news-thumbnails')
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_featured')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('author.name'),
                TextColumn::make('newsCategory.title'), 
                TextColumn::make('title'),
                TextColumn::make('slug'),
                ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->url(fn ($record) => asset('storage/' . $record->thumbnail)),
                ToggleColumn::make('is_featured')

            ])
            ->filters([
                SelectFilter::make('author_id')
                    ->relationship('author', 'name')
                    ->label('select Author'), 
                SelectFilter::make('news_category_id')
                    ->relationship('newsCategory', 'title')
                    ->label('select Category')

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
        ];
    }
}
