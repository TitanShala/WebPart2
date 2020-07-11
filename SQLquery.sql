create Database WebProject
use WebProject

create table Account(
Username varchar(20) primary key,
Password varchar(20),
Email varchar(30),
role int
)

select * from Account where role = 0 and Username = 'TitanShala'


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

INSERT INTO Doktori (Emri,Mbiemri,Specializimi,Pervoja,Stafi) VALUES ('Titan', 'Shala', 'Kirurg', 2, 'TitanShala')

drop table Reparti
drop table Doktori
drop table Account

create table Reparti(
Id int primary key identity(1,1),
Emri varchar(20) unique ,
NrDhoma int,
Stafi varchar(20),
foreign key(Stafi) references Account(Username)
)
drop table Reparti

select * from Reparti
select * from Doktori

select TOP 4 *  
from Doktori
order by 
Pervoja DESC

create table DoctorManage(
Id int primary key identity(1,1),
Stafi varchar(20),
Doctor int,
Aktiviteti varchar(20),
foreign key(Stafi) references Account(Username),
foreign key(Doctor) references Doktori(id)
)
Select * FROM DepartmentManage
create table DepartmentManage(
Id int primary key identity(1,1),
Stafi varchar(20),
Reparti int,
Aktiviteti varchar(20),
foreign key(Stafi) references Account(Username),
foreign key(Reparti) references Reparti(id)
)

alter table DoctorManage add Data date

select * from DoctorManage

select * from Reparti

select * from DepartmentManage
select * from DoctorManage

create table Contacts(
Id int primary key identity(1,1),
Data Date,
Name varchar (20),
Email varchar (50),
Message varchar(500)
)

insert into Contacts values ('2020-07-11','Titan Shala','titanshala@gmail.com', 'Pershendetje, cilave dite punoni?')
insert into Contacts values ('2020-07-11','Titan Shala','titanshala@gmail.com', 'Pershendetje, cilave dite punoni?')

select * from Contacts order by Id desc

Delete from Contacts


create table HospitalInfo(
Id int primary key ,
HenePremteOrari varchar(20),
ShtuneOrari varchar(20),
DieleOrari varchar(20),
PushimOrari varchar(20),
EmergencyNumber varchar(20),
NumberForInfo varchar(20),
Email varchar(40),
HospitalName varchar(20),
StreetAdress varchar(40)
)

select*from HospitalInfo

insert into HospitalInfo values (0,'8:00-16:00' , '9:00-12:00' , 'Closed' , '10:00-11:00', '+383-49-123-456', '+383-44-123-456','HospitalPeja@gmail.com','Peja','Kosove & Peje Bill Clinton, 231')