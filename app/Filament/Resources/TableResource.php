<?php

namespace App\Filament\Resources;

use App\Enums\TableType;
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
                Tables\Columns\TextColumn::make('type')
                    ->getStateUsing(fn($record) => $record->type->name)
                    ->label("Статус"),
                Tables\Columns\TextColumn::make('seats_max')
                    ->sortable()
                    ->label("Количество мест"),
                Tables\Columns\TextColumn::make("facilities.name")->badge(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make("type")
                    ->options(Arr::pluck(TableType::cases(), 'name', 'value')),
                Tables\Filters\SelectFilter::make("facilities")
                    ->relationship("facilities", "name"),
                Tables\Filters\Filter::make("seats_max")
                    ->query(fn(Builder $query, array $count) => $query->whereIn("seats_max", "=", $count))
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
                Forms\Components\Select::make('type')
                    ->options(Arr::pluck(TableType::cases(), 'name', 'value'))
                    ->required(),
                Forms\Components\TextInput::make('seats_max')
                    ->integer()
                    ->required(),
                Forms\Components\Select::make('branch_id')
                    ->relationship("branch", "name")
                    ->required(),
                Forms\Components\CheckboxList::make("facilities")
                    ->relationship("facilities", "name")
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
                Infolists\Components\TextEntry::make('type')
                    ->getStateUsing(fn($record) => $record->type->name)
                    ->label("Статус"),
                Infolists\Components\TextEntry::make("seats_max")
                    ->label("Количество мест"),
                Infolists\Components\TextEntry::make("branch.name")
                    ->label("Название филиала"),
                Infolists\Components\TextEntry::make("facilities.name")
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
