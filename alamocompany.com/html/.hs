RewriteEngine On

RewriteCond %{HTTP_HOST} ^www.alamocompany.com [NC]
RewriteRule ^(.*)$ https://www.alamocompany.us/$1 [L,R=301]

RewriteCond %{HTTP_HOST} ^alamocompany.com [NC]
RewriteRule ^(.*)$ https://www.alamocompany.us/$1 [L,R=301]

redirectMatch 301 ^(.*)$ https://alamocompany.us/


