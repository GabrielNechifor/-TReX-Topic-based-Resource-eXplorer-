CREATE TABLE `users` (
 `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
 `oauth_provider` varchar(255) NOT NULL,
 `oauth_uid` varchar(255)  NOT NULL,
 `first_name` varchar(255) NOT NULL,
 `last_name` varchar(255) NOT NULL,
 `email` varchar(50)  NOT NULL,
 `gender` varchar(10) DEFAULT NULL,
 `locale`  varchar(10) DEFAULT NULL, 
 `picture` varchar(255) DEFAULT NULL,
 `link` varchar(255) NOT NULL,
 `created` DATE NOT NULL,
 `modified` DATE NOT NULL
)

create table `tags` (
 `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
 `name` Varchar(255) not null
)

create table RESOURCES (
 `id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
   `name `  Varchar(255)   not null,
   `URI ` Varchar(255) not null
)

create table COMMENTS 
( 
 `userId` Int not null,
 `resourceId` Integer not null,
 `text` varchar(4000) not null,
 FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
 FOREIGN KEY (`resourceId`) REFERENCES `resources` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION )

create table `RECOMANDARI` (
  `userId`   Int not null,
  `resourceId`    Int not null,
  `nota` int not null,
  FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
 FOREIGN KEY (`resourceId`) REFERENCES `resources` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION )

create table BOOKMARKS (
  `userId`   Int not null,
  `resourceId`    Int not null,
  FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
 FOREIGN KEY (`resourceId`) REFERENCES `resources` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION )

create table `USER_TAGS` (
  `userId`   Int not null,
  `resourceId`    Int not null,
  `tagId` Int not null,
  FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
 FOREIGN KEY (`resourceId`) REFERENCES `resources` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
FOREIGN KEY (`tagId`) REFERENCES `tags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
)