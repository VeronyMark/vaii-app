<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller {
    public function toggleLike(Request $request) {
        try {
            // Your logic to toggle the like status based on $request->postId
            // Update the isLiked status accordingly

            return response()->json(['isLiked' => true]); // Example response
        } catch (\Exception $e) {
            // Log the error for further investigation
            \Log::error('Error toggling like: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
