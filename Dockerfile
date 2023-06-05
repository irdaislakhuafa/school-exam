FROM irdaislakhuafa/xampp:7.4.30
WORKDIR /opt/lampp/htdocs/school-exam
COPY . .
RUN echo 'sleep 5 && /opt/lampp/bin/mysql -u root < /opt/lampp/htdocs/school-exam/schema.sql' >> /env.sh
