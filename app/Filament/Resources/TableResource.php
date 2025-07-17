<?php

namespace App\Filament\Resources;

use App\Enums\TableStatus;
use App\Filament\Resources\TableResource\Pages;
use App\Filament\Resources\TableResource\RelationManagers;
use App\Models\Table as TableModel;
use Arr;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Database\Query\Builder;

class TableResource extends Resource
{
    protected static ?string $model = TableModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("id")
                    ->sortable(),
                Tables\Columns\TextColumn::make("branch.name")
                    ->searchable()
                    ->label("Название филиала"),
                Tables\Columns\TextColumn::make('table_number')
                    ->sortable()
                    ->label("Номер стола"),
                Tables\Columns\TextColumn::make('status')
                    ->getStateUsing(fn($record) => $record->status->name)
                    ->label("Статус"),
                Tables\Columns\TextColumn::make('number_of_seats')
                    ->sortable()
                    ->label("Количество мест"),
                Tables\Columns\TextColumn::make("facility.name")->badge(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make("status")
                    ->options(Arr::pluck(TableStatus::cases(), 'name', 'value')),
                Tables\Filters\SelectFilter::make("facility")
                    ->relationship("facility","name"),
                Tables\Filters\Filter::make("number_of_seats")
                    ->query(fn(Builder $query, array $count)=>
                    $query->whereIn("number_of_seats","=",$count))
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label("Изменить"),
                Tables\Actions\DeleteAction::make()
                    ->label("Удалить"),
                Tables\Actions\ViewAction::make()
                    ->label("Посмотреть")
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('table_number')
                    ->required()
                    ->integer(),
                Forms\Components\Select::make('status')
                    ->options(Arr::pluck(TableStatus::cases(), 'name', 'value'))
                    ->required(),
                Forms\Components\TextInput::make('number_of_seats')
                    ->integer()
                    ->required(),
                Forms\Components\Select::make('branch_id')
                    ->relationship("branch","name")
                    ->required(),
                Forms\Components\CheckboxList::make("facility")
                    ->relationship("facility","name")
                    ->required()
                    ->columns(3),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('id'),
                Infolists\Components\TextEntry::make('table_number')
                    ->label("Номер стола"),
                Infolists\Components\TextEntry::make('status')
                    ->getStateUsing(fn ($record) => $record->status->name)
                    ->label("Статус"),
                Infolists\Components\TextEntry::make("number_of_seats")
                    ->label("Количество мест"),
                Infolists\Components\TextEntry::make("branch.name")
                    ->label("Название филиала"),
                Infolists\Components\TextEntry::make("facility.name")
                    ->badge()
                    ->label("Удобства")
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTables::route('/'),
            'create' => Pages\CreateTable::route('/create'),
            'view' => Pages\ViewTable::route('/{record}'),
            'edit' => Pages\EditTable::route('/{record}/edit'),
        ];
    }
}
