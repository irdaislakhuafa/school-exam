FROM irdaislakhuafa/xampp:7.4.30
WORKDIR /opt/lampp/htdocs/
RUN rm -rfv *
EXPOSE 8081
COPY . .
RUN echo "\
    sed s/'Listen 80'/'Listen 8081'/g \-i /opt/lampp/etc/httpd.conf;\
    sed s/'http:\/\/localhost\/school-exam\/'/'https:\/\/school-exam.fly.dev\/'/g -i /opt/lampp/htdocs/application/config/config.php; \
    /opt/lampp/lampp restart; \
    sleep 5 && /opt/lampp/bin/mysql -u root < /opt/lampp/htdocs/schema.sql" >> /env.sh
