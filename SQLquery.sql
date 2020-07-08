create Database WebProject
use WebProject
create table Account(
Id int primary key identity(1,1),
Username varchar(20),
Password varchar(20),
Email varchar(30),
role int
)
Insert into Account values ('admin','admin','safas@gmail.com',1)

create table Doktori(
Id int primary key identity(1,1),
Emri varchar(20),
Mbiemri varchar(20),
Specializimi varchar(30),
Pervoja int,
Stafi int ,
foreign key(Stafi) references Account(Id)
)

select TOP 4 *  
from Doktori
order by 
Pervoja DESC


