<?php defined('SYSPATH') or die('No direct script access.');
/**
 *  this XgFFMpeg_Video class cuts / converts / thumb video sources
 *
 *  @autor      f.fiebig <webpiraten>
 *  @version    2.0
 *  @since      05/2011
 *
 *  Therefore you have to install ffmpeg on your system
 *
 *  @see    http://ffmpeg.org/
 *  @see    http://ffmpeg.org/documentation.html
 *
 *  usage like this:
 *
 *  $version    = XgFFMpeg_Video::version(); // get ffmpeg version
 *  $info       = XgFFMpeg_Video::info('test.mp4'); // get file info
 *  $thumb      = XgFFMpeg_Video::thumb($source, $target, '00:00:30', '300x220'); // create thumbnail
 *  $clip       = XgFFMpeg_Video::clip($source, $target, '00:00:30', '00:00:30'); // cut a clip
 *  $preset     = XgFFMpeg_Video::preset($source, $target, 'flv_320x180'); // use a preset
 */
class XgFFMpeg_Video
{
    public static function version()
    {
        return explode(PHP_EOL, self::execute('ffmpeg -version'));
    }

    public static function info($source)
    {
        $result = self::execute('ffmpeg -i '.$source);

        $search     = '/Duration: (.*?)[.]/';
        preg_match($search, $result, $matches, PREG_OFFSET_CAPTURE);
        $duration   = trim($matches[1][0]);

        $search     = '/Video: (.*?)[\n]/';
        preg_match($search, $result, $matches, PREG_OFFSET_CAPTURE);
        $video      = explode(', ', trim($matches[1][0]));

        $search     = '/Audio: (.*?)[\n]/';
        preg_match($search, $result, $matches, PREG_OFFSET_CAPTURE);
        $audio      = explode(', ', trim($matches[1][0]));

        return array(
            'source'    => $source,
            'video'     => $video,
            'audio'     => $audio,
            'duration'  => $duration,
        );
    }

    public static function thumb($source, $target, $offset = '00:00:50', $format = '100x80')
    {
        $result = self::execute('ffmpeg -y -i '.$source.' -f mjpeg -ss '.$offset.' -vframes 1 -s '.$format.' -an '.$target);
        if(is_file($target))
        {
            return $target;
        }
        throw new Exception('Thumbnail could not be created!');
    }

    public static function clip($source, $target, $offset = '00:00:50', $duration = '00:00:50')
    {
        $result = self::execute('ffmpeg -i '.$source.' -ss '.$offset.' -t '.$duration.' '.$target);
        if(is_file($target))
        {
            return $target;
        }
        throw new Exception('Clip could not be created!');
    }

    public static function preset($source, $target, $preset)
    {
        $presets = Kohana::config('xgffmpeg.presets');
        if(array_key_exists($preset, $presets))
        {
            $command    = $presets[$preset]['command'];
            $extension  = $presets[$preset]['extension'];
            if(!strrchr($target, '.'.$extension))
            {
                $target = $target.'.'.$extension;
            }
            $result = self::execute('ffmpeg -i '.$source.' '.$command.' '.$target);
            if(is_file($target))
            {
                return $target;
            }
            throw new Exception('Converted file could not be created!');
        }
        throw new Exception($preset.' not available!');
    }

    protected static function execute($command)
    {
        ob_start();
        passthru(Kohana::config('xgffmpeg.ffmpeg_path').$command.' 2>&1');
        $retval = ob_get_contents();
        ob_end_clean();
        return $retval;
    }
}