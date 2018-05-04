
create table admin(
id int(11) not null primary key AUTO_INCREMENT,
username varchar(255) not null,
password varchar(255) not null
);

create table chat(
id int(11) not null primary key AUTO_INCREMENT,
username varchar(255) not null,
msg text not null
);

create table login(
uid int(11) not null primary key AUTO_INCREMENT,
uname varchar(255) not null,
email varchar(255) not null,
registration_no varchar(20) not null,
pwd varchar(255) not null
);

create table profileimg(
id int(11) not null primary key AUTO_INCREMENT,
uid varchar(255) not null,
status int(1) not null default 0,
img text 
);

create table tbl_message(
id int(11) not null primary key AUTO_INCREMENT,
messageTo varchar(255) not null,
messageFrom varchar(255) not null,
message text not null,
readStatus int(11) not null default 0,
msg_time datetime default NULL
);

create table tbl_post(
post_id int(11) not null primary key AUTO_INCREMENT,
post_owner varchar(255) not null,
post_create_time datetime not null,
post_text text not null,
post_jType varchar(20),
post_cName varchar(255) not null,
post_jProfile text not null,
post_ownerName varchar(255) not null
);

create table tbl_profile(
id int(11) not null primary key AUTO_INCREMENT,
uid varchar(255) not null,
f_name varchar(255) not null,
l_name varchar(255) not null,
company_name varchar(255) not null,
job_location varchar(255) not null,
job_type varchar(15) not null,
job_profile varchar(255) not null
);

create table tbl_resume(
id int(11) not null primary key AUTO_INCREMENT,
user_id varchar(255) not null,
status int(1) not null default 0,
resume_file text not null
);

