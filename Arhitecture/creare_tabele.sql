DROP TABLE USERS CASCADE CONSTRAINTS
/
DROP TABLE TAGS CASCADE CONSTRAINTS
/
DROP TABLE RESOURCES CASCADE CONSTRAINTS
/
DROP TABLE RECOMANDARI CASCADE CONSTRAINTS
/
DROP TABLE BOOKMARKS CASCADE CONSTRAINTS
/
DROP TABLE COMMENTS CASCADE CONSTRAINTS
/
DROP TABLE USER_TAGS CASCADE CONSTRAINTS
/


CREATE TABLE USERS (
 id int NOT NULL primary key,
 oauth_provider varchar2(15) NOT NULL,
 oauth_uid varchar2(25)  NOT NULL,
 first_name varchar2(25) NOT NULL,
 last_name varchar2(25) NOT NULL,
 email varchar2(50)  NOT NULL,
 gender varchar2(10) DEFAULT NULL,
 locale  varchar2(10) DEFAULT NULL, 
 picture varchar2(255) DEFAULT NULL,
 link varchar2(255) NOT NULL,
 created DATE NOT NULL,
 modified DATE NOT NULL
)
/

create table TAGS (
  id Int PRIMARY KEY not null,
  name Varchar2(255) not null
)
/

create table RESOURCES (
  id    Int PRIMARY KEY not null,
  name  Varchar2(255)   not null,
  URI Varchar2(255) not null
)
/

create table COMMENTS (
  userId        Int  not null,
  resourceId        Integer    not null,
  text varchar2(4000)  not null,
  CONSTRAINT fk_comment_user_id FOREIGN KEY (userId) references USERS(id),
  CONSTRAINT fk_comment_resources_id FOREIGN KEY (resourceId) references RESOURCES(id)
)
/

create table RECOMANDARI (
  userId   Int not null,
  resourceId    Int not null,
  nota int not null,
  CONSTRAINT fk_recom_user_id FOREIGN KEY (userId) references USERS(id),
  CONSTRAINT fk_recom_resources_id FOREIGN KEY (resourceId) references RESOURCES(id)
)
/

create table BOOKMARKS (
  userId   Int not null,
  resourceId    Int not null,
  CONSTRAINT fk_bookm_user_id FOREIGN KEY (userId) references USERS(id),
  CONSTRAINT fk_bookm_resources_id FOREIGN KEY (resourceId) references RESOURCES(id)
)
/

create table USER_TAGS (
  userId   Int not null,
  resourceId    Int not null,
  tagId Int not null,
  CONSTRAINT fk_ut_user_id FOREIGN KEY (userId) references USERS(id),
  CONSTRAINT fk_ut_resources_id FOREIGN KEY (resourceId) references RESOURCES(id),
  CONSTRAINT fk_ut_tag_id FOREIGN KEY (tagID) references TAGS(id)
)
