| Initial Setup |
| ---  |

- Update API Url in **Line 57** in **index.php** in root project.
  
`define('API','http://e5403ae7.ngrok.io/jots-api/');`

---
| Web Performance APACHE Setup |
| ---  |

#CACHE

  - https://www.serverlab.ca/tutorials/linux/web-servers-linux/improve-website-performance-by-enabling-caching-in-apache/

#GZIP

- uncomment this line **php.ini**
  `LoadModule deflate_module modules/mod_deflate.so`

- put this in the end of your **.htaccess**
  ```
  <IfModule mod_deflate.c>
  # Force compression for mangled headers.
  # http://developer.yahoo.com/blogs/ydn/posts/2010/12/pushing-beyond-gzipping
  <IfModule mod_setenvif.c>
    <IfModule mod_headers.c>
      SetEnvIfNoCase ^(Accept-EncodXng|X-cept-Encoding|X{15}|~{15}|-{15})$ ^((gzip|deflate)\s*,?\s*)+|[X~-]{4,13}$ HAVE_Accept-Encoding
      RequestHeader append Accept-Encoding "gzip,deflate" env=HAVE_Accept-Encoding
    </IfModule>
  </IfModule>

  # Compress all output labeled with one of the following MIME-types
  # (for Apache versions below 2.3.7, you don't need to enable `mod_filter`
  #  and can remove the `<IfModule mod_filter.c>` and `</IfModule>` lines
  #  as `AddOutputFilterByType` is still in the core directives).

  <IfModule mod_filter.c>
    AddOutputFilterByType DEFLATE application/atom+xml \
    application/javascript \
    application/json \
    application/rss+xml \
    application/vnd.ms-fontobject \
    application/x-font-ttf \
    application/x-web-app-manifest+json \
    application/xhtml+xml \
    application/xml \
    font/woff2 \
    font/opentype \
    image/svg+xml \
    image/x-icon \
    text/css \
    text/html \
    text/plain \
    text/x-component \
    text/xml
  </IfModule>
</IfModule>
```