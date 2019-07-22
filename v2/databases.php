<?php 


include "dbconfig.php";


$sql = "CREATE TABLE posts (
PostID INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  
Heading VARCHAR(512) NULL,
URL VARCHAR(512) NULL,
ViewMode VARCHAR(100) NULL,
UserID VARCHAR(256)  NULL,
Category VARCHAR(256)  NULL,
SubCategory VARCHAR(256)  NULL,
Description TEXT(10000)  NULL,
CoverImage VARCHAR(256) NULL,
CoverType VARCHAR(256) NULL,
CoverSize VARCHAR(256) NULL,
files VARCHAR(256) NULL,
price VARCHAR(256) NULL,
primg1 VARCHAR(256) NULL,
primg2 VARCHAR(256) NULL,
primg3 VARCHAR(256) NULL,
primg4 VARCHAR(256) NULL,
primg5 VARCHAR(256) NULL,
Hits VARCHAR(512) NULL,
Audio VARCHAR(256) NULL,
downloads VARCHAR(512) NULL,
MetaDescription VARCHAR(2000) NULL,
MetaKeywords VARCHAR(4000) NULL,
PublishDate VARCHAR(256) NULL
)";


if ($conn->query($sql) === TRUE) {
    echo "Table post created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}
    


    


$sql = "CREATE TABLE hits (
hitNo INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  
PostID VARCHAR(512) NULL,
Hitter VARCHAR(512) NULL,
IP VARCHAR(256) NULL
)";



if ($conn->query($sql) === TRUE) {
    echo "Table Hits created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql = "CREATE TABLE downloads (
dwnNo INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  
PostID VARCHAR(512) NULL,
Downloader VARCHAR(512) NULL,
IP VARCHAR(256) NULL
)";




if ($conn->query($sql) === TRUE) {
    echo "Table downloads created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}




$sql = "CREATE TABLE comments (
cmNo INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  
PostID VARCHAR(512) NULL,
name VARCHAR(512) NULL,
comment TEXT(1024) NULL,
email VARCHAR(512) NULL

)";




if ($conn->query($sql) === TRUE) {
    echo "Table comments created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql = "CREATE TABLE report (
rNo INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  
PostID VARCHAR(512) NULL,
name VARCHAR(512) NULL,
message TEXT(1024) NULL,
email VARCHAR(512) NULL

)";




if ($conn->query($sql) === TRUE) {
    echo "Table report created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}







$sql = "CREATE TABLE user (
UserID INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  
Fullname VARCHAR(256) NULL,
Email VARCHAR(256) NULL,
Username VARCHAR(256) NULL,
Password VARCHAR(100)  NULL,
ProfilePic VARCHAR(256) NULL,
ProfilePicSize VARCHAR(256) NULL,
ProfilePicType VARCHAR(256) NULL,
RegistrationDate VARCHAR(256) NULL
)";


if ($conn->query($sql) === TRUE) {
    echo "Table user created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}



$sql = " ALTER TABLE course ADD files varchar(255);";
if ($conn->query($sql) === TRUE) {
    echo "Files added course successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}






$sql = "CREATE INDEX user_Username_idx ON user(Username) ";
if ($conn->query($sql) === TRUE) {
    echo "Index username created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}




$sql = "CREATE INDEX user_Fullname_idx ON user(Fullname) ";
if ($conn->query($sql) === TRUE) {
    echo "Index fullname created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql = "CREATE INDEX user_Email_idx ON user(Email) ";
if ($conn->query($sql) === TRUE) {
    echo "Index email created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}





$sql = "CREATE INDEX post_heading_idx ON posts(Heading) ";
if ($conn->query($sql) === TRUE) {
    echo "Index Heading created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}



$sql = "CREATE INDEX course_heading_idx ON course(Heading) ";
if ($conn->query($sql) === TRUE) {
    echo "Index Title created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}






?>
