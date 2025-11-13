@props(['src', 'alt' => 'Image', 'width' => null, 'height' => null, 'class' => ''])

@php
    // Extract public_id from Cloudinary URL if needed
    $transformedUrl = $src;

    if ($width || $height) {
        // Add transformation parameters
        $transformations = [];
        if ($width)
            $transformations[] = "w_$width";
        if ($height)
            $transformations[] = "h_$height";
        $transformations[] = "c_fill"; // Crop to fill
        $transformations[] = "q_auto"; // Auto quality
        $transformations[] = "f_auto"; // Auto format

        $transformStr = implode(',', $transformations);
        $transformedUrl = str_replace('/upload/', "/upload/$transformStr/", $src);
    }
@endphp

<img src="{{ $transformedUrl }}" alt="{{ $alt }}" class="{{ $class }}" loading="lazy">