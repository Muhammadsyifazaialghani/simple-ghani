<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SasaranResource\Pages;
use App\Filament\Resources\SasaranResource\RelationManagers;
use App\Models\Sasaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;


class SasaranResource extends Resource
{
    protected static ?string $model = Sasaran::class;

    protected static ?string $navigationGroup = 'Data';
    protected static ?string $navigationLabel = 'Sasaran';
    protected static ?string $modelLabel = 'Sasaran';
    protected static ?string $pluralModelLabel = 'Sasaran';
    protected static ?string $title = 'Tambah Sasaran';
    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-x-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255)
                    ->label('Sasaran')
                    ->columnSpanFull(),
                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->rows(3)
                    ->maxLength(1000)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no')
                    ->rowIndex()
                    ->label('No'),
                TextColumn::make('nama')
                    ->label('Sasaran')
                    ->searchable(),
                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->grow()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSasarans::route('/'),
        ];
    }
}
