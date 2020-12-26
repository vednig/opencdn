# OpenCDN
Notice: OpenCDN is not a proper CDN but rather a way for small sites and startups to keep delivering content even in case of low traffic.
When you have gathered enogh traffic consider switching.
<br>

OpenCDN way for Non-Popular static JS , CSS and HTML.
To create your own CDN.And deliver content faster.<br>
**Why was it needed?**<br>
When using a popular CDN service like fastly or cloudflare your content has time limitations if traffic comes after a specific time again.
Still it will take same time for it to work.To prevent this situation an alternative was created as a php program.For example, add files on all 3 servers but on connection of client it will accept the file from the nearest server.

**How to Use:**<br>

Add files insert.php and result.php to your servers.<br>
Distribute your content to all the servers.<br>
Save nearest server I.P. or Hostname to the user in localstorage.<br>
Now Cache the common scripts in local storage.(Optional)<br>
Each time a content is requested relocate to the nearest Host or I.P.<br>
