<?php

namespace App\Services;

use App\Http\Resources\EntryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;


class EntryService
{
    public function index()
    {
        return response()->json(EntryResource::collection(Entry::all()));
    }
    public function store(array $entryData): JsonResponse
    {
        $entry = Entry::create([
            'category_id'=>$entryData['category_id'],
            'name' => $entryData['name'],
            'comment' => $entryData['comment'],
            'amount'=>$entryData['amount']
        ]);

        return response()->json(['id' => $entry->id]);
    }

    public function update(array $entryData, Entry $entry): JsoneResponse
    {
        $category ->name = $entryData['name'];
        $category ->description =  $entryData['description'];
        $category ->type = $entryData['type'];

        $entry->save();

        return response()->json($entry);
    }
}