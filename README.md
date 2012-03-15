smarty-plugin-block-android-market
==================================

master: [![Build Status](https://secure.travis-ci.org/yuya-takeyama/smarty-plugin-block-android-market.png?branch=master)](http://travis-ci.org/yuya-takeyama/smarty-plugin-block-android-market)
develop: [![Build Status](https://secure.travis-ci.org/yuya-takeyama/smarty-plugin-block-android-market.png?branch=develop)](http://travis-ci.org/yuya-takeyama/smarty-plugin-block-android-market)

Smarty block function plugin to link to Google Play apps store.

Synopsis
--------

### Link to app detail

```
{android_market app="com.example"}Example App{/android_market}

<a href="http://play.google.com/store/apps/details?id=com.example">Example App</a>
```

### Link to developer detail

```
{android_market developer="example-developer"}Example Developer{/android_market}

<a href="http://play.google.com/store/apps/developer?id=example-developer">Example Developer</a>
```

### Link to search result

```
{android_market search="some words"}Some Words{/android_market}

<a href="http://play.google.com/store/search?q=some%20words">Some Words</a>
```

### Add HTML attributes

```
{android_market app="com.example" id="foo" data_text="Bar & Baz"}Example App{/android_market}

<a href="http://play.google.com/store/apps/details?id=com.example" id="foo" data-text="Bar &amp; Baz">Example App</a>
```

Author
------

Yuya Takeyama [http://yuyat.jp/](http://yuyat.jp/)
