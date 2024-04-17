<?php

return [
    'mode'                     => '',
    'format'                   => 'A4-L',
    'default_font_size'        => '12',
    'default_font'             => 'ibmplexserif', // always with a lowercase!!!
    'margin_left'              => 0,
    'margin_right'             => 0,
    'margin_top'               => 0,
    'margin_bottom'            => 0,
    'margin_header'            => 0,
    'margin_footer'            => 0,
    'orientation'              => 'P',
    'title'                    => 'Laravel mPDF',
    'subject'                  => '',
    'author'                   => '',
    'watermark'                => '',
    'show_watermark'           => false,
    'show_watermark_image'     => false,
    'watermark_font'           => 'ibmplexserif',
    'display_mode'             => 'fullpage',
    'watermark_text_alpha'     => 0.1,
    'watermark_image_path'     => '',
    'watermark_image_alpha'    => 0.2,
    'watermark_image_size'     => 'D',
    'watermark_image_position' => 'P',
    'custom_font_dir' => base_path('resources/fonts/IBM_Plex_Serif_Web/'), // don't forget the trailing slash!
    'custom_font_data' => [
        'ibmplexserif' => [
            'R'  => 'IBMPlexSerif-Regular.ttf',    // regular font
        ],
        'ibmplexseriflight' => [
            'L'  => 'IBMPlexSerif-Light.ttf',    // light font
        ],
    ],
    'auto_language_detection'  => false,
    'temp_dir'                 => storage_path('app'),
    'pdfa'                     => false,
    'pdfaauto'                 => false,
    'use_active_forms'         => false,
];
