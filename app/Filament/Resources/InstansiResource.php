<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstansiResource\Pages;
use App\Filament\Resources\InstansiResource\RelationManagers;
use App\Models\Instansi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;


class InstansiResource extends Resource
{
    protected static ?string $model = Instansi::class;

    protected static ?string $navigationGroup = 'Data';
    protected static ?string $navigationLabel = 'Instansi';
    protected static ?string $modelLabel = 'Instansi';
    protected static ?string $pluralModelLabel = 'Instansi';
    protected static ?string $title = 'Tambah Kategori Pelatihan';
    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_instansi')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama')
                    ->placeholder('Masukkan nama instansi')
                    ->columnSpanFull(),

                Textarea::make('alamat')
                    ->label('Alamat')
                    ->required()
                    ->rows(3)
                    ->placeholder('Masukkan alamat lengkap instansi')
                    ->columnSpanFull(),

                Fieldset::make('Kontak')
                    ->schema([
                        TextInput::make('no_telp')
                            ->maxLength(255)
                            ->label('No. Telepon')
                            ->numeric(),
                        TextInput::make('email')
                            ->required()
                            ->maxLength(255)
                            ->label('Email'),
                        TextInput::make('website')
                            ->maxLength(255)
                            ->label('Website')
                            ->url()
                            ->suffixIcon('heroicon-o-globe-alt')
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table


            ->columns([
                TextColumn::make('no')
                    ->rowIndex()
                    ->label('No')
                    ->alignCenter(),

                TextColumn::make('nama_instansi')
                    ->label('Nama')
                    ->searchable()
                    ->formatStateUsing(function ($state, $record) {

                        $alamat = $record->alamat ? "<div class='text-xs text-gray-500'>{$record->alamat}</div>" : '';

                        return $state . $alamat;
                    })

                    ->html()
                    ->grow(),
                TextColumn::make('id')
                    ->label('Kontak')
                    ->html()
                    ->formatStateUsing(function ($state, $record) {
                        return
                            "<div>
                            <div><strong>No. Telepon :</strong> <span class=\"text-xs text-gray-500\">{$record->no_telp}</span></div> 
                            <div><strong>Email :</strong> <span class=\"text-xs text-gray-500\">{$record->email}</span></div>
                             <div><strong>Website :</strong> <span class=\"text-xs text-gray-500\">{$record->website}</span></div>
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
            'index' => Pages\ManageInstansis::route('/'),
        ];
    }
}
