<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\UrlHash;
use Hashids\Hashids;
use Hash;

class UrlHashController extends Controller
{
    //
    public function create()
    {
        return view('url-hash.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'url' => 'required|url',
            'click_limit' => 'required|integer|min:1',
        ]);
        $originalUrl = $request->input('url');

        // Generate a hash from the URL
        $hash = $this->hashUrl($originalUrl);
        // Initialize the Hashids instance with a secret key
        $hashids = new Hashids('hash_url');

        // Encode the hash to get the hashed URL
        $hashedUrl = $hashids->encode($hash);
        
       
         $expired_at = Carbon::now()->addDays(!empty($request->input('days_limit')) ? $request->input('days_limit') : 15);
        // Create a new URL record in the database
        UrlHash::create([
            'original_url' => $validatedData['url'],
            'click_limit' => $validatedData['click_limit'],
            'hashed_url' => $hashedUrl,
            'expired_at' => $expired_at
        ]);

        // Redirect or display a success message
        return redirect()->route('urls.index')->with('status', 'success')->with('message', 'URL created successfully.');
    }
    
    public function redirectUrl($hash)
    {
        // Retrieve the original URL based on the hash
        $url = UrlHash::where('hashed_url', $hash)->firstOrFail();
        // Check if the URL has expired or reached the maximum click count
        if ($url->click_count >= $url->click_limit) {
            // Handle invalid or expired URLs (e.g., redirect to an error page)
            return redirect()->route('expired-url');
        }

        // Increment the click count
        $url->increment('click_count');

        // Check if the URL has expired based on the time limit
        if ($url->expired_at && Carbon::now()->gt($url->expired_at)) {
            // Mark the URL as expired
            $url->expired = true;
            $url->save();

            // Handle expired URLs (e.g., redirect to an error page)
            return redirect()->route('expired-url');
        }

        // Redirect to the original URL
        return redirect($url->original_url);
    }

    public static function hashUrl($url)
    {
        // Generate a hash from the URL using a hashing algorithm
        $hash = Hash::make($url);
        // Remove any characters that are not URL safe
        $hash = str_replace(['/', '+', '=', '$', '.'], ['_', '-', '',''], $hash);
        preg_match_all('!\d+!', $hash, $matches);
        $data = implode("",$matches[0]);
        // Return the hash
        return $data;
    }

    public function index()
    {
        $urls = UrlHash::all();
        return view('url-hash.index', compact('urls'));
    }
    public function destroy(UrlHash $url)
    {
        $url->delete();

        return redirect()->route('urls.index')->with('status', 'success')->with('message', 'URL deleted successfully.');
    }

    public function expiredUrl()
    {
        return view('url-hash.expired');
    }
}
