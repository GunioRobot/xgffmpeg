<?php defined('SYSPATH') or die('No direct script access.');

class Controller_XgFFMpeg extends Controller
{
    public function action_index()
    {
        /* be aware that video conversion can consume a lot of cpu / ram / time usage */

        /* get ffmpeg version info */
        $version = XgFFMpeg_Video::version();
        var_dump($version);

        /* get video file info */
        $info = XgFFMpeg_Video::info(Kohana::config('xgffmpeg.asset_path').'test.mp4');
        var_dump($info);

        /* create thumbnail from video file */
        $source = Kohana::config('xgffmpeg.asset_path').'test.mp4';
        $target = Kohana::config('xgffmpeg.asset_path').'test.jpg';
        $thumb = XgFFMpeg_Video::thumb($source, $target, '00:00:30', '300x220');
        var_dump($thumb);

        /* create preview clip from video file */
        $source = Kohana::config('xgffmpeg.asset_path').'test.mp4';
        $target = Kohana::config('xgffmpeg.asset_path').'test_clip.mp4';
        $clip = XgFFMpeg_Video::clip($source, $target, '00:00:30', '00:00:30');
        var_dump($clip);

        /* use presets to convert video file */
        $source = $clip;
        $target = Kohana::config('xgffmpeg.asset_path').'test_clip_flv_converted.flv';
        $preset = XgFFMpeg_Video::preset($source, $target, 'flv_320x180');
        var_dump($preset);
    }
}
