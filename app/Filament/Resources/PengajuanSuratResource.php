<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengajuanSuratResource\Pages;
use App\Filament\Resources\PengajuanSuratResource\RelationManagers;
use App\Models\PengajuanSurat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengajuanSuratResource extends Resource
{
    protected static ?string $model = PengajuanSurat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('nama_pemohon')
                ->required()
                ->label('Nama Pemohon'),

                Forms\Components\TextInput::make('jenis_surat')
                ->required()
                ->label('Jenis Surat'),

                Forms\Components\DatePicker::make('tanggal_pengajuan')
                ->required()
                ->label('Tanggal Pengajuan'),

                Forms\Components\Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'disetujui' => 'Disetujui',
                    'ditolak' => 'Ditolak',
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
                Tables\Columns\TextColumn::make('nama_pemohon')
                ->sortable()
                ->searchable()
                ->label('Nama Pemohon'),

                Tables\Columns\TextColumn::make('jenis_surat')
                ->sortable()
                ->label('Jenis Surat'),

                Tables\Columns\TextColumn::make('tanggal_pengajuan')
                ->sortable()
                ->label('Tanggal Pengajuan'),

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
            'index' => Pages\ListPengajuanSurats::route('/'),
            'create' => Pages\CreatePengajuanSurat::route('/create'),
            'edit' => Pages\EditPengajuanSurat::route('/{record}/edit'),
        ];
    }
}
