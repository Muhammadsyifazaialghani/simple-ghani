<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WidyaiswaraResource\Pages;
use App\Filament\Resources\WidyaiswaraResource\RelationManagers;
use App\Models\Widyaiswara;
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
use Filament\Forms\Components\Fieldset;

class WidyaiswaraResource extends Resource
{
    protected static ?string $model = Widyaiswara::class;

    protected static ?string $navigationGroup = 'Data';
    protected static ?string $navigationLabel = 'Widyaiswara';
    protected static ?string $modelLabel = 'Widyaiswara';
    protected static ?string $pluralModelLabel = 'Widyaiswara';
    protected static ?int $navigationSort = 4;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nip')
                    ->required()
                    ->maxLength(255)
                    ->label('NIP')
                    ->columnSpanFull(),

                TextInput::make('nama')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama')
                    ->columnSpanFull(),

                TextInput::make('satker')
                    ->required()
                    ->maxLength(255)
                    ->label('Satker')
                    ->columnSpanFull(),

                Fieldset::make('Kontak')
                    ->schema([
                        TextInput::make('no_telp')
                            ->maxLength(255)
                            ->label('Telepon')
                            ->columnSpanFull(),
                        TextInput::make('email')
                            ->required()
                            ->maxLength(255)
                            ->label('Email')
                            ->email()
                            ->columnSpanFull(),
                    ])
                    ->columns(1),

                Textarea::make('alamat')
                    ->label('Alamat')
                    ->required()
                    ->rows(3)
                    ->placeholder('Masukkan alamat lengkap')
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
                TextColumn::make('nip')
                    ->label('NIP')
                    ->searchable(),

                TextColumn::make('nama')
                    ->label('Nama & Satker')
                    ->searchable()
                    ->formatStateUsing(function ($state, $record) {
                        $satker = $record->satker ? "<div class='text-xs text-gray-500'>Satker : {$record->satker}</div>" : '';
                        return "<div>{$state}</div>" . $satker;
                    })
                    ->html(),

                TextColumn::make('id')
                    ->label('Kontak')
                    ->html()
                    ->formatStateUsing(function ($state, $record) {
                        return
                            "<div>
                            <div><strong>No. Telepon :</strong> <span class=\"text-xs text-gray-500\">{$record->no_telp}</span></div> 
                            <div><strong>Email :</strong> <span class=\"text-xs text-gray-500\">{$record->email}</span></div>
                        </div>";
                    })
                    ->html()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
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
            'index' => Pages\ManageWidyaiswaras::route('/'),
        ];
    }
}
