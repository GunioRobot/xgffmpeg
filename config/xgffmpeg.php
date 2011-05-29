<?php defined('SYSPATH') or die('No direct script access.');

return array(
    'ffmpeg_path'   => '/usr/local/bin/',               // path to your local ffmpeg installation
    'asset_path'    => '/home/modules/xgffmpeg/media/', // path to sources - make shure this path is writable
    'presets'       => array(                           // keep in mind that params may vary depending on ffmpeg version
        'ms_avi_640x480' => array(
            'extension' => 'avi',
            'command'   => '-acodec libmp3lame -vcodec msmpeg4 -ab 192kb -b 1000kb -s 640x480 -ar 44100',
        ),
        
        '3gpp_h264_320x240_4:3_aac' => array(
            'extension' => '3gp',
            'command'   => '-r 15 -b 128kb -s 320x240 -ar 22050 -ab 64kb -acodec libfaac -vcodec libx264 -coder 1 -flags +loop -cmp +chroma -partitions +parti4x4+partp8x8+partb8x8 -me_method hex -subq 6 -me_range 16 -g 250 -keyint_min 25 -sc_threshold 40 -i_qfactor 0.71 -b_strategy 1 -threads 0',
        ),
        
        '3gpp_h264_320x240_16:9_aac' => array(
            'extension' => '3gp',
            'command'   => '-r 15 -b 128kb -s 320x180 -padtop 30 -padbottom 30 -ar 22050 -ab 64kb -acodec libfaac -vcodec libx264 -coder 1 -flags +loop -cmp +chroma -partitions +parti4x4+partp8x8+partb8x8 -me_method hex -subq 6 -me_range 16 -g 250 -keyint_min 25 -sc_threshold 40 -i_qfactor 0.71 -b_strategy 1 -threads 0',
        ),
        
        'mp4_h264_high' => array(
            'extension' => 'mp4',
            'command'   => '-crf 35.0 -vcodec libx264 -acodec libfaac -ar 48000 -ab 128kb -coder 1 -flags +loop -cmp +chroma -partitions +parti4x4+partp8x8+partb8x8 -me_method hex -subq 6 -me_range 16 -g 250 -keyint_min 25 -sc_threshold 40 -i_qfactor 0.71 -b_strategy 1 -threads 0',
        ),
        
        'mp4_h264_very_high' => array(
            'extension' => 'mp4',
            'command'   => '-crf 25.0 -vcodec libx264 -acodec libfaac -ar 48000 -ab 160kb -coder 1 -flags +loop -cmp +chroma -partitions +parti4x4+partp8x8+partb8x8 -me_method hex -subq 6 -me_range 16 -g 250 -keyint_min 25 -sc_threshold 40 -i_qfactor 0.71 -b_strategy 1 -threads 0',
        ),
        
        'mp4_h264_super_high' => array(
            'extension' => 'mp4',
            'command'   => '-crf 15.0 -vcodec libx264 -acodec libfaac -ar 48000 -ab 192kb -coder 1 -flags +loop -cmp +chroma -partitions +parti4x4+partp8x8+partb8x8 -me_method hex -subq 6 -me_range 16 -g 250 -keyint_min 25 -sc_threshold 40 -i_qfactor 0.71 -b_strategy 1 -threads 0',
        ),
        
        'mp4_android_480x320_480' => array(
            'extension' => 'mp4',
            'command'   => '-s 480x320 -vcodec mpeg4 -b 480k -acodec libfaac -ac 1 -ar 16000 -r 13 -ab 32000 -aspect 3:2',
        ),
        
        'mp4_android_480x320' => array(
            'extension' => 'mp4',
            'command'   => '-s 480x320 -vcodec mpeg4 -acodec libfaac -ac 1 -ar 16000 -r 13 -ab 32000 -aspect 3:2',
        ),
        
        'mov_h264_high' => array(
            'extension' => 'mov',
            'command'   => '-crf 35.0 -vcodec libx264 -acodec libfaac -ar 48000 -ab 128kb -coder 1 -flags +loop -cmp +chroma -partitions +parti4x4+partp8x8+partb8x8 -me_method hex -subq 6 -me_range 16 -g 250 -keyint_min 25 -sc_threshold 40 -i_qfactor 0.71 -b_strategy 1 -threads 0',
        ),
        
        'mov_h264_very_high' => array(
            'extension' => 'mov',
            'command'   => '-crf 25.0 -vcodec libx264 -acodec libfaac -ar 48000 -ab 160kb -coder 1 -flags +loop -cmp +chroma -partitions +parti4x4+partp8x8+partb8x8 -me_method hex -subq 6 -me_range 16 -g 250 -keyint_min 25 -sc_threshold 40 -i_qfactor 0.71 -b_strategy 1 -threads 0',
        ),
        
        'mov_h264_super_high' => array(
            'extension' => 'mov',
            'command'   => '-crf 15.0 -vcodec libx264 -acodec libfaac -ar 48000 -ab 192kb -coder 1 -flags +loop -cmp +chroma -partitions +parti4x4+partp8x8+partb8x8 -me_method hex -subq 6 -me_range 16 -g 250 -keyint_min 25 -sc_threshold 40 -i_qfactor 0.71 -b_strategy 1 -threads 0',
        ),
        
        'flv_320x240' => array(
            'extension' => 'flv',
            'command'   => '-vcodec flv -f flv -r 29.97 -s 320x240 -aspect 4:3 -b 300kb -g 160 -cmp dct  -subcmp dct  -mbd 2 -flags +aic+cbp+mv0+mv4 -trellis 1 -ac 1 -ar 22050 -ab 56kb',
        ),
        
        'flv_320x180' => array(
            'extension' => 'flv',
            'command'   => '-vcodec flv -f flv -r 29.97 -s 320x180 -aspect 16:9 -b 300kb -g 160 -cmp dct -subcmp dct -mbd 2 -flags +aic+cbp+mv0+mv4 -trellis 1 -ac 1 -ar 22050 -ab 56kb',
        ),
        
        'wmv_320x240' => array(
            'extension' => 'wmv',
            'command'   => '-vcodec wmv2  -acodec wmav2 -b 640kb -ab 128kb -r 29.97 -s 320x240',
        ),
    )
);