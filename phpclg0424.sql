CREATE TABLE IF NOT EXISTS `users`
(
    `uname` VARCHAR(16)                          PRIMARY KEY,
    `upass` VARCHAR(255)                         NOT NULL,
    `utype` SET ('user', 'admin') DEFAULT 'user' NOT NULL
);

CREATE TABLE IF NOT EXISTS `calendars`
(
    `cid`   INT(11) AUTO_INCREMENT PRIMARY KEY,
    `cname` VARCHAR(255) NOT NULL,
    `uname` VARCHAR(16)  NOT NULL,
    FOREIGN KEY (`uname`) REFERENCES `users` (`uname`)
);

CREATE TABLE IF NOT EXISTS `events`
(
    `eid`    INT(8)       AUTO_INCREMENT PRIMARY KEY,
    `etitle` VARCHAR(255) NOT NULL,
    `edate`  DATE         NOT NULL,
    `cid`    INT(11)      NOT NULL,
    FOREIGN KEY (`cid`) REFERENCES `calendars` (`cid`)
);
