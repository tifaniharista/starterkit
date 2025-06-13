<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the news articles.
     */
    public function index()
    {
        $news = News::latest()->paginate(9);
        return view('news-index', compact('news'));
    }

    /**
     * Show the form for creating a new news article.
     */
    public function create()
    {
        return view('create-news');
    }

    /**
     * Store a newly created news article in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048', // Max 2MB
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
        }

        $news = News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('news.show', $news)->with('success', 'Berita berhasil diterbitkan!');
    }

    /**
     * Display the specified news article.
     */
    public function show(News $news)
    {
        return view('news-show', compact('news'));
    }

    /**
     * Show the form for editing the specified news article.
     */
    public function edit(News $news)
    {
        return view('news-edit', compact('news')); // Kita akan buat view ini selanjutnya
    }

    /**
     * Update the specified news article in storage.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048', // Max 2MB
        ]);

        $imagePath = $news->image_path; // Default: gunakan path gambar lama
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($news->image_path) {
                Storage::disk('public')->delete($news->image_path);
            }
            $imagePath = $request->file('image')->store('news_images', 'public');
        } elseif ($request->boolean('remove_image')) { // Opsi untuk menghapus gambar tanpa mengunggah yang baru
            if ($news->image_path) {
                Storage::disk('public')->delete($news->image_path);
            }
            $imagePath = null;
        }

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('news.show', $news)->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Remove the specified news article from storage.
     */
    public function destroy(News $news)
    {
        // Hapus gambar terkait jika ada
        if ($news->image_path) {
            Storage::disk('public')->delete($news->image_path);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'Berita berhasil dihapus!');
    }

    /**
     * Display a listing of the news articles on the dashboard.
     * (This method will be called from the dashboard view)
     */
    public static function getLatestNews($limit = 5)
    {
        return News::latest()->limit($limit)->get();
    }
}
