# HtmlNormalizer v 0.0.1

## What is it
HtmlNormalizer is a php library used to take inputs from HTTP POST & GET request in a comparatively safer way.
It is a tentative, quick & handy tool for beginner developers working in a small and less-secured php project.

## Usage
Helpful to prevent XSS attacks.

## Cross-Site Scripting (XSS)
Cross-Site Scripting (XSS) attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application uses input from a user within the output it generates without validating or encoding it.

An attacker can use XSS to send a malicious script to an unsuspecting user. The end user’s browser has no way to know that the script should not be trusted, and will execute the script. Because it thinks the script came from a trusted source, the malicious script can access any cookies, session tokens, or other sensitive information retained by the browser and used with that site. These scripts can even rewrite the content of the HTML page.

## WARNING
This tool SHOULD NOT BE THE ONLY MECHANISM to prevent XSS attacks. Use more appropiate functions or other means depending on the context of the output.

## Behind the scene
This tool uses the following php functions-
```sh
    strip_tags()
    stripslashes()
    htmlspecialchars()
```

## Installation
Import the file in your project-
```sh
require_once("HtmlNormalizer.php");
```
## How to use
Create new instance-
```sh
$normalizer = new HtmlNormalizer();
```
Take the value you want to normalize-
```sh
$normalizer->HTML($raw_html);
```
Directly from HTTP POST/GET Request  
```sh
$normalizer->HttpPost($http_post_field_name);
$normalizer->HttpGet($http_get_field_name);
```
Remove HTML and PHP tags from a string
```sh
$normalizer-> RemoveTags();
```
Removes backslashes from a string
```sh
$normalizer-> RemoveBackslash();
```
Convert special characters to HTML entities-
```sh
$normalizer-> Convert();
```
Get the normalized value-
```sh
$normalized = $normalizer-> Normalize();
```
Get the normalized value without calling RemoveTags(), RemoveBackslash() and Convert() separately
```sh
$normalized = $normalizer-> NormalizeAll();
```

Do it all in one line-
```sh
$normalized = $normalizer->HTML($raw_html)->RemoveTags()->RemoveBackslash()->Convert()->Normalize();
```