<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {android_market}{/android_market} block plugin
 *
 * Type:     block function<br />
 * Name:     android_market<br />
 * Purpose:  Links to Google Play apps store.<br />
 *
 * @link   https://github.com/yuya-takeyama/smarty-plugin-block-android-market
 * @author Yuya Takeyama <sign.of.the.wolf.pentagram at gmail.com>
 * @param  array
 * <pre>
 * Params:   appid: string (Android app package name)
 * </pre>
 * @param  string contents of the block
 * @param  Smarty
 * @return string
 */
function smarty_block_android_market($params, $content, &$smarty)
{
    $store = 'http://play.google.com/store';

    if (array_key_exists('appid', $params)) {
        return sprintf(
            '<a href="%s%s%s">%s</a>',
            $store, '/apps/details?id=', urlencode($params['appid']), $content
        );
    } else if (array_key_exists('developer', $params)) {
        return sprintf(
            '<a href="%s%s%s">%s</a>',
            $store, '/apps/developer?id=', urlencode($params['developer']), $content
        );
    }
}
