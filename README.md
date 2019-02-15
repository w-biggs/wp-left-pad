# Product Name
Because programming sucks.

## Installation

Download the [latest .zip release](https://github.com/w-biggs/left-pad/releases/latest), then install it via the "Add Plugin" button on WordPress's "Plugins" page.

## Usage example

Just use the shortcode in any WordPress text area. Easy peasy. A few examples:

```
[left-pad foo 5]
// => "  foo"

[left-pad foobar 6]
// => "foobar"

[left-pad 1 2 0]
// => "01"

[left-pad 17 5 0]
// => "00017"
```

**Note:** The third argument should be a single character. Obviously.

## Release History

* 0.1
  * Work in progress

## Meta

Distributed under the WTFPL. Because who cares. See ``LICENSE`` for more information.

## FAQ

### Why?

I originally had the idea to do this after someone on Reddit joked about WordPress plugins being like node modules. I responded with a [low-effort left-pad joke](https://www.reddit.com/r/webdev/comments/aqw3xe/i_think_now_i_understand_why_people_hate_wordpress/egjng0d/), but soon thought "hey, that might actually be funny to do!". It was a fun little exercise to spend a little time on.

### Boooring. You just have to use `str_pad()`, right?

Wrong. `str_pad()` doesn't handle multi-byte characters correctly, and while I tried to replicate the functionality of [left-pad](https://www.npmjs.com/package/left-pad) as closely as possible, multi-byte characters needed to work correctly. Otherwise, I couldn't use non-breaking spaces (which are encoded as `c2 a0` in UTF-8); I needed to use non-breaking spaces as WordPress automatically consolidates consecutive normal spaces into one space.