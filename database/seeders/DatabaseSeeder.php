<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WikipediaArticle;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $json = file_get_contents(storage_path('app/tiny.json'));
        $articlesData = json_decode($json, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Invalid JSON file: ' . json_last_error_msg());
        }
        $articlesData = is_array($articlesData) ? $articlesData : [$articlesData];

        foreach ($articlesData as $articleData) {
            WikipediaArticle::create([
                'title' => $articleData['Title'],
                'body' => $this->cleanContent($articleData['Body']),
                'references' => $articleData['References'],
                'categories' => $articleData['Categories'],
                'infobox' => $articleData['Infobox'],
                'url' => $articleData['URL']
            ]);
        }
    }

    protected function cleanContent(string $content)
    {
        // Remove section headers and edit links
        $content = preg_replace('/\[edit\]/', '', $content);

        // Remove extra whitespaces
        $content = preg_replace('/\s+/', ' ', $content);

        // Trim content
        return trim($content);
    }




}
