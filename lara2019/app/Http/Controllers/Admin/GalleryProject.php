<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\GalleryProject;


class GalleryProjectController extends Controller
{


    /**
     * Listing Of images gallery
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Upload image function
     *
     * @return \Illuminate\Http\Response
     */



    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ImageGallery::find($id)->delete();
        return back()
            ->with('success','Image removed successfully.');
    }
}
