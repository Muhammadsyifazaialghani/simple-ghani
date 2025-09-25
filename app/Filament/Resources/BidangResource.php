<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BidangResource\Pages;
use App\Filament\Resources\BidangResource\RelationManagers;
use App\Models\Bidang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BidangResource extends Resource
{
    protected static ?string $model = Bidang::class;

    protected static ?string $navigationGroup = 'Data';
    protected static ?string $navigationLabel = 'Bidang';
    protected static ?string $modelLabel = 'Bidang';
    protected static ?string $pluralModelLabel = 'Bidang';
    protected static ?string $title = 'Tambah Kategori Pelatihan';
    protected static ?int $navigationSort = 5;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_bidang')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Bidang')
                    ->columnSpanFull(),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->rowIndex()
                    ->label('No'),
                Tables\Columns\TextColumn::make('nama_bidang')
                    ->label('Nama Bidang')
                    ->searchable()
                //
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
            'index' => Pages\ManageBidangs::route('/'),
        ];
    }
}
