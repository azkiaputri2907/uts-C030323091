<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengaduanResource\Pages;
use App\Filament\Resources\PengaduanResource\RelationManagers;
use App\Models\Pengaduan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengaduanResource extends Resource
{
    protected static ?string $model = Pengaduan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('nama_pengadu')
                ->required()
                ->label('Nama Pengadu'),

                Forms\Components\TextInput::make('kontak')
                ->required()
                ->label('Kontak'),

                Forms\Components\Textarea::make('isi_pengaduan')
                ->required()
                ->label('Isi Pengaduan'),

                Forms\Components\Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'proses' => 'Proses',
                    'selesai' => 'Selesai',
                ])
                ->default('pending')
                ->label('Status')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('nama_pengadu')
                ->sortable()
                ->searchable()
                ->label('Nama Pengadu'),

                Tables\Columns\TextColumn::make('kontak')
                ->label('Kontak'),

                Tables\Columns\TextColumn::make('isi_pengaduan')
                ->limit(50)
                ->label('Isi Pengaduan'),

                Tables\Columns\TextColumn::make('status')
                ->sortable()
                ->label('Status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPengaduans::route('/'),
            'create' => Pages\CreatePengaduan::route('/create'),
            'edit' => Pages\EditPengaduan::route('/{record}/edit'),
        ];
    }
}
