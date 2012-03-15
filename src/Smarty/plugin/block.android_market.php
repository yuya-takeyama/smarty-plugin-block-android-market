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

    $attr = '';
    foreach ($params as $key => $value) {
        if (in_array($key, array('app', 'developer', 'search'), true)) {
            continue;
        }
        $attr .= sprintf(' %s="%s"', $key, htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
    }

    if (array_key_exists('app', $params)) {
        return sprintf(
            '<a href="%s%s%s"%s>%s</a>',
            $store, '/apps/details?id=', rawurlencode($params['app']), $attr, $content
        );
    } else if (array_key_exists('developer', $params)) {
        return sprintf(
            '<a href="%s%s%s"%s>%s</a>',
            $store, '/apps/developer?id=', rawurlencode($params['developer']), $attr, $content
        );
    } else if (array_key_exists('search', $params)) {
        return sprintf(
            '<a href="%s%s%s"%s>%s</a>',
            $store, '/search?q=', rawurlencode($params['search']), $attr, $content
        );
    } else {
        return $content;
    }
}
