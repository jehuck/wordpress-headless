```
docker build -t jh/wordpress:v1 .
```

```
docker run -d -p 8090:80 --name wordpress -v "D:\SRC\Proyectos\Dockers\UbuntuWordpress\src:/var/www/html/wordpress" jh/wordpress:v1
```


