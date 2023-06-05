FROM irdaislakhuafa/xampp:7.4.30
WORKDIR /opt/lampp/htdocs/school-exam
EXPOSE 8081
COPY . .
RUN echo "sed s/'Listen 80'/'Listen 8081'/g -i /opt/lampp/etc/httpd.conf;\
    /opt/lampp/lampp restart; \
    sleep 5 && /opt/lampp/bin/mysql -u root < /opt/lampp/htdocs/school-exam/schema.sql" >> /env.sh
