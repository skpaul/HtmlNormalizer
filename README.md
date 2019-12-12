# HtmlNormalizer v 0.0.1

HtmlNormalizer is a tentative, quick & handy tool to take inputs from HTTP POST & GET request in a comparatively safe way. <br>

Helpful to prevent XSS attacks.

# Cross-Site Scripting (XSS)
Cross-Site Scripting (XSS) attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted websites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application uses input from a user within the output it generates without validating or encoding it.

An attacker can use XSS to send a malicious script to an unsuspecting user. The end user’s browser has no way to know that the script should not be trusted, and will execute the script. Because it thinks the script came from a trusted source, the malicious script can access any cookies, session tokens, or other sensitive information retained by the browser and used with that site. These scripts can even rewrite the content of the HTML page.

# WARNING
This tool SHOULD NOT BE THE ONLY MECHANISM to prevent XSS attacks. Use more appropiate functions or other means depending on the context of the output.

# Behind the scene
This tool uses the following php functions-
```sh
strip_tags()
stripslashes()
htmlspecialchars()
```

# How to use
Import the file in your project- <br>
require_once("HtmlNormalizer.php");
<br><br>
<em>Create new instanc-</em><br>
$normalizer = new HtmlNormalizer();
<br><br>
<em>Take the value you want to normalize-</em><br>
$normalizer->HTML($raw_html);<br>
OR, Directly from HTTP POST Request  
<pre><code>$normalizer->HttpPost($http_post_field_name);</code></pre>
$normalizer->HttpPost($http_post_field_name); <br>