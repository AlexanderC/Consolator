<?php
/**
 * Created by PhpStorm.
 * User: AlexanderC <alex@mitocgroup.com>
 * Date: 12/11/14
 * Time: 15:53
 */

namespace AlexanderC\Consolator\Command\Output\Formatter;


/**
 * Class ColorFormatter
 * @package AlexanderC\Consolator\Command\Output\Formatter
 */
class ColorFormatter extends AbstractFormatter
{
    const COLORIZE_TPL = "\033[%sm";
    const RESET = "\033[0m";

    const T_BG_START = '/b\[\s*(?P<bg_color>[\w\+]+)\s*\]';
    const T_FG_START = '/f\[\s*(?P<fg_color>[\w\+]+)\s*\]';
    const T_BG_END = '/(?P<bg_end>\!)b';
    const T_FG_END = '/(?P<fg_end>\!)f';

    const COLOR_DELIMITER = '+';

    /**
     * @var array
     */
    protected $backgroundMapping = [
        'black' => '40',
        'red' => '41',
        'green' => '42',
        'yellow' => '43',
        'blue' => '44',
        'magenta' => '45',
        'cyan' => '46',
        'light_gray' => '47',
        'white' => '107',
    ];

    /**
     * @var array
     */
    protected $foregroundMapping = [
        'black' => '30',
        'blue' => '34',
        'green' => '32',
        'cyan' => '36',
        'red' => '31',
        'purple' => '35',
        'brown' => '33',
        'yellow' => '33',
        'white' => '37',
        'blink' => '5',
        'inverted' => '7',
        'bold' => '1',
        'dim' => '2',
        'underlined' => '4',
        'hidden' => '8',
    ];

    /**
     * @param string $string
     * @return string
     */
    public function format($string)
    {
        return preg_replace_callback($this->buildTokenizerRegex(), function($matches) {
            if(isset($matches['bg_color']) && !empty($matches['bg_color'])) {
                return sprintf(
                    self::COLORIZE_TPL,
                    $this->resolveBackgroundColor(explode(self::COLOR_DELIMITER, $matches['bg_color']))
                );
            }

            if(isset($matches['fg_color']) && !empty($matches['fg_color'])) {
                return sprintf(
                    self::COLORIZE_TPL,
                    $this->resolveForegroundColor(explode(self::COLOR_DELIMITER, $matches['fg_color']))
                );
            }

            if((isset($matches['bg_end']) && !empty($matches['bg_end']))
                || isset($matches['fg_end']) && !empty($matches['fg_end'])) {
                return self::RESET;
            }

            return $matches[0];
        }, $string);
    }

    /**
     * @param string $color
     * @return string
     */
    protected function resolveForegroundColor($color)
    {
        if(is_array($color)) {
            $resolvedColors = [];

            foreach($color as $colorPart) {
                $resolvedColors[] = $this->resolveForegroundColor($colorPart);
            }

            return implode(';', $resolvedColors);
        }

        if(!isset($this->foregroundMapping[$color])) {
            throw new \RuntimeException(sprintf("Missing color '%s' from foreground colors mapping", $color));
        }

        return $this->foregroundMapping[$color];
    }

    /**
     * @param string $color
     * @return string
     */
    protected function resolveBackgroundColor($color)
    {
        if(is_array($color)) {
            $resolvedColors = [];

            foreach($color as $colorPart) {
                $resolvedColors[] = $this->resolveBackgroundColor($colorPart);
            }

            return implode(';', $resolvedColors);
        }

        if(!isset($this->backgroundMapping[$color])) {
            throw new \RuntimeException(sprintf("Missing color '%s' from background colors mapping", $color));
        }

        return $this->backgroundMapping[$color];
    }

    /**
     * @return string
     */
    protected function buildTokenizerRegex()
    {
        return sprintf("#(?:%s)#sui", implode('|', [
            self::T_BG_START, self::T_BG_END,
            self::T_FG_START, self::T_FG_END
        ]));
    }
} 