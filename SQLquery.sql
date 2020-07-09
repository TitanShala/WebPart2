create Database WebProject
use WebProject

create table Account(
Username varchar(20) primary key,
Password varchar(20),
Email varchar(30),
role int
)


Alter Table Account add Emri varchar (20)
Alter Table Account add Mbiemri varchar (20)
Insert into Account values ('Titanshala','1234567','safas@gmail.com',1,'Titan','Shala')
Delete from Account

select * from Account where Username = 'TitanShala'

select * from table Account where Username ='TitanShala'

create table Doktori(
Id int primary key identity(1,1),
Emri varchar(20),
Mbiemri varchar(20),
Specializimi varchar(30),
Pervoja int,
Stafi varchar (20) ,
foreign key(Stafi) references Account(Username)
)

drop table Reparti
drop table Doktori
drop table Account

create table Reparti(
Id int primary key identity(1,1),
Emri varchar(20),
NrDhoma int,
Stafi varchar(20),
foreign key(Stafi) references Account(Username)
)

select TOP 4 *  
from Doktori
order by 
Pervoja DESC



