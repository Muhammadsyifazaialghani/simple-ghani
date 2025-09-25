<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisPelatihanResource\Pages;
use App\Filament\Resources\JenisPelatihanResource\RelationManagers;
use App\Models\JenisPelatihan;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class JenisPelatihanResource extends Resource
{
    protected static ?string $model = JenisPelatihan::class;

    protected static ?string $navigationGroup = 'Data';
    protected static ?string $navigationLabel = 'Jenis Pelatihan';
    protected static ?string $modelLabel = 'Jenis Pelatihan';
    protected static ?string $pluralModelLabel = 'Jenis Pelatihan';
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Jenis Pelatihan')
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
                    ->label('Jenis Pelatihan')
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
            'index' => Pages\ManageJenisPelatihans::route('/'),
        ];
    }
}
