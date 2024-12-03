<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WikipediaArticle;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');

        // Perform full-text search
        $results = WikipediaArticle::search($query)
            ->paginate(10);

        return view('search.results', [
            'results' => $results,
            'query' => $query
        ]);
    }
}
