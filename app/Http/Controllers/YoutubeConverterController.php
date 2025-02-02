<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use YoutubeDl\Options;
use YoutubeDl\YoutubeDl;
use Illuminate\Support\Facades\Storage;

class YoutubeConverterController extends Controller
{
    public function convert(Request $request)
    {
        $request->validate([
            'video_url' => 'required|url',
            'format' => 'required|in:mp3,mp4'
        ]);

        try {
            $binPath = base_path('python/yt-dlp');
            $ffmpegPath = base_path('python/ffmpeg');
            $ffprobePath = base_path('python/ffprobe');
            
            $yt = new YoutubeDl();
            $yt->setBinPath($binPath);
            
            $options = Options::create()
                ->downloadPath(storage_path('app/public/downloads'))
                ->extractAudio($request->format === 'mp3')
                ->audioFormat($request->format)
                ->audioQuality('0')
                ->output('%(title)s.%(ext)s')
                ->ffmpegLocation($ffmpegPath)
                ->url($request->video_url);

            $collection = $yt->download($options);

            foreach ($collection->getVideos() as $video) {
                if ($video->getError() !== null) {
                    throw new \Exception($video->getError());
                }
                return response()->download($video->getFile())->deleteFileAfterSend();
            }
            
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to convert video: ' . $e->getMessage());
        }
    }
}
