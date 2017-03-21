# windows安装
## 安装前准备：
下载nginx:—网址：[下载](nginx.org/en/download.html) ; 
下载PHP开发环境—网址：[下载](php.net/download/) ;
mysql数据库—网址：[下载](http://dev.mysql.com/downloads/windows/installer/)
安装下载.net framework运行时（库）环境（开发环境）,微软下载：[下载](http://www.microsoft.com/zh-cn/download/confirmation.aspx?id=5582)
在D盘建立Dev文件夹，存放源代码或开发软件安装目录；在Dev文件夹里见htdocs文件夹，存放www访问的根目录；

## 安装配置Nginx服务器：
1、解压nginx压缩包到D盘，目录命名为nginx-1.7.10文件夹（因为本压缩包是nginx-1.7.10版本，所以就这样命名）；
2、复制nginx/conf/nginx.conf，拷贝一份；
3、修改nginx.conf配置文件（#表示注解，目录使用“\”反斜杠）：
原配置文件代码：
```
        location / {
            root   html;  #存放PHP源代码目录
            index  index.html index.htm;
        }
        # ....省略....
        #location ~ \.php$ {
        #    root           html; #存放PHP源代码目录
        #    fastcgi_pass   127.0.0.1:9000; #网站IP地址+端口
        #    fastcgi_index  index.php;
        #    fastcgi_param  SCRIPT_FILENAME  /scripts$fastcgi_script_name;
        #    include        fastcgi_params;
        #}
```       
修改为：
```
location / {
   root d:\dev\htdocs;
   index index.php index.html;
}

location ~ \.php$ {
   root d:\dev\htdocs;
   fastcgi_pass 127.0.0.1:9000;
   fastcgi_index index.php;
   fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
   include fastcgi_params;
}
```
## 安装配置PHP：
1、解压PHP压缩包到D盘，目录命名为php-5.6.6文件夹；
2、复制php-5.6.6目录下的php.ini-development文件，拷贝一份；
3、重命名php.ini-development后缀名，为php.ini;
4、修改php.ini配置文件（分号表示注解，目录使用“\”反斜杠）：
修改后的部分配置：
```
extension_dir = "D:\php-5.6.6\ext"
date.timezone = "Asia/Shanghai"

extension=php_curl.dll
extension=php_mbstring.dll
extension=php_openssl.dll

extension=php_pdo_mysql.dll

extension=php_sqlite3.dll
extension=php_pdo_sqlite.dll
```
  配置完毕后，要在dos里运行nginx里面的nginx.exe和php里的php-cgi.exe;
选中程序所在目录，shift+右键  ，执行命令行；如下：
D:\nginx-1.7.10>`nginx.exe -c conf\nginx.conf`

D:\php-5.6.6>`php-cgi.exe -b 127.0.0.1:9000 -c php.ini`

windows 下 关闭nginx程序,在该程序所在目录命令行输入nginx.exe -s stop  



