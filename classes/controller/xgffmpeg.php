<?php defined('SYSPATH') or die('No direct script access.');

class Controller_XgFFMpeg extends Controller
{
    public function action_index()
    {
        /* be aware that video conversion can consumes a lot of cpu / ram / time usage */
        $ffmpeg = new XgFFMpeg_Video();
        
        /* get ffmpeg version info */
        $version = $ffmpeg->version();
        var_dump($version);
        
        /* get video file info */
        $info = $ffmpeg->info(Kohana::config('xgffmpeg.asset_path').'test.mp4');
        var_dump($info);
        
        /* create thumbnail from video file */
        $source = Kohana::config('xgffmpeg.asset_path').'test.mp4';
        $target = Kohana::config('xgffmpeg.asset_path').'test.jpg';
        $thumb = $ffmpeg->thumb($source, $target, '00:00:30', '300x220');
        var_dump($thumb);

        /* create preview clip from video file */
        $source = Kohana::config('xgffmpeg.asset_path').'test.mp4';
        $target = Kohana::config('xgffmpeg.asset_path').'test_clip.mp4';
        $clip = $ffmpeg->clip($source, $target, '00:00:30', '00:00:30');
        var_dump($clip);

        /* use presets */
        $source = $clip;
        $target = Kohana::config('xgffmpeg.asset_path').'test_clip_flv_converted.flv';
        $preset = $ffmpeg->preset($source, $target, 'flv_320x180');
        var_dump($preset);
    }
}
