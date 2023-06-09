FROM irdaislakhuafa/xampp:7
#FROM tomsik68/xampp:7
WORKDIR /opt/lampp/htdocs/
RUN rm -rfv *
EXPOSE 80
COPY . .
#RUN (sed s/'Listen 80'/'Listen 8081'/g \-i /opt/lampp/etc/httpd.conf) &
RUN sed s/'http:\/\/localhost\/school-exam\/'/'https:\/\/school-exam.fly.dev\/'/g -i /opt/lampp/htdocs/application/config/config.php
RUN mkdir -pv uploads/
#CMD /opt/lampp/lampp start
#CMD sh /startup.sh &
#CMD (sleep 30 && /opt/lampp/bin/mysql -u root < /opt/lampp/htdocs/schema.sql) &
