<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Y2Mate - YouTube to MP3 Converter</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <div class="container mx-auto px-4 py-8">
        <!-- Navigation -->
        <nav class="flex justify-center space-x-6 mb-12">
            <a href="/" class="hover:text-gray-300">Home</a>
            <a href="/faq" class="hover:text-gray-300">FAQ</a>
            <a href="/add-on" class="hover:text-gray-300">Add-On</a>
            <a href="/changelog" class="hover:text-gray-300">Changelog</a>
        </nav>

        <!-- Logo -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold flex items-center justify-center">
                <span class="text-red-500">Y2</span>Mate
            </h1>
        </div>

        <!-- Converter Form -->
        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-6 mb-12">
            <form action="{{ route('convert') }}" method="POST" class="space-y-4">
                @csrf
                <div class="text-gray-700 mb-4">Insert a YouTube video URL</div>
                <div class="flex gap-2">
                    <input type="text" 
                           name="video_url" 
                           class="flex-1 border rounded-lg px-4 py-2 text-gray-700" 
                           placeholder="youtube.com/watch?v=..." 
                           required>
                    <select name="format" class="bg-gray-800 text-white px-4 py-2 rounded-lg">
                        <option value="mp3">MP3</option>
                        <option value="mp4">MP4</option>
                    </select>
                    <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded-lg">Convert</button>
                </div>
            </form>
        </div>

        <!-- Description -->
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-2xl font-bold mb-6">YouTube to MP3 Converter</h2>
            <p class="mb-8">
                Our YouTube to MP3 Converter allows you to convert your favorite YouTube videos to MP3 (audio) or MP4 (video) files and to download them for FREE. Y2Mate works on your desktop, tablet and mobile device without the installation of any additional apps. The usage of Y2Mate is free, and safe!
            </p>
        </div>
    </div>
</body>
</html>