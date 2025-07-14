<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TableResource\Pages;
use App\Filament\Resources\TableResource\RelationManagers;
use App\Models\Facility;
use App\Models\Table as TableModel;
use Faker\Provider\Text;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TableResource extends Resource
{
    protected static ?string $model = TableModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(match (true) {
                // Если branch числовой, добавляем дополнительные колонки
                is_numeric(request()->query("branch")) => [
                    Tables\Columns\TextColumn::make('table_number')
                        ->searchable()
                        ->sortable()
                        ->label("Номер стола"),
                    Tables\Columns\TextColumn::make('status')
                        ->searchable()
                        ->sortable()
                        ->getStateUsing(fn($record) => $record->status->name)
                        ->label("Статус"),
                    Tables\Columns\TextColumn::make('number_of_seats')
                        ->searchable()
                        ->sortable()
                        ->label("Количество мест"),
                    Tables\Columns\TextColumn::make("facility.name")->badge(),
                ],
                // Иначе возвращаем базовые колонки
                default => [
                    Tables\Columns\TextColumn::make("id"),
                    Tables\Columns\TextColumn::make("branch.name")
                        ->sortable()
                        ->searchable()
                        ->label("Название филиала"),
                    Tables\Columns\TextColumn::make('table_number')
                        ->searchable()
                        ->sortable()
                        ->label("Номер стола"),
                    Tables\Columns\TextColumn::make('status')
                        ->searchable()
                        ->sortable()
                        ->getStateUsing(fn($record) => $record->status->name)
                        ->label("Статус"),
                    Tables\Columns\TextColumn::make('number_of_seats')
                        ->searchable()
                        ->sortable()
                        ->label("Количество мест"),
                    Tables\Columns\TextColumn::make("facility.name")->badge(),
                ],
            })
            ->modifyQueryUsing(fn(Builder $query) => $query->when(
                request()->query("branch"),
                fn(Builder $query, $branch_id) => $query->where("branch_id", $branch_id))
            )
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label("Изменить"),
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
            'index' => Pages\ListTables::route('/'),
            'create' => Pages\CreateTable::route('/create'),
            'edit' => Pages\EditTable::route('/{record}/edit'),
        ];
    }
}
